<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Featured Services (for Services Section)
        // Eager load pricing plans to display prices
        // 1. Featured Services (Now actually Featured Pricing Plans)
        $featuredServices = \App\Models\ServicePricingPlan::featured()
            ->ordered()
            ->with(['service', 'billingCycle', 'pricingPlanFeatures.feature'])
            ->limit(3)
            ->get();

        // Fallback to popular if no featured plans found (optional, or just combine)
        if ($featuredServices->isEmpty()) {
            $featuredServices = \App\Models\ServicePricingPlan::popular()
                ->ordered()
                ->with(['service', 'billingCycle', 'pricingPlanFeatures.feature'])
                ->limit(3)
                ->get();
        }

        // 2. Comparison Data
        $comparison = \App\Models\ServiceComparison::active()->first();
        $comparisonServices = [];
        $comparisonFeatures = [];

        if ($comparison) {
            $comparisonServices = $comparison->services;

            // Extract all unique feature keys from the services' comparison data
            // We need to loop through the pivot data (ComparisonService) to get comparison_data
            foreach ($comparison->comparisonServices as $compService) {
                $data = $compService->comparison_data;

                if (is_string($data)) {
                    $data = json_decode($data, true);
                }

                if (is_array($data)) {
                    $keys = array_keys($data);
                    $comparisonFeatures = array_unique(array_merge($comparisonFeatures, $keys));
                }
            }
        }

        // 3. Why Choose StoreHub (Features)
        $features = \App\Models\Feature::ordered()->limit(4)->get();

        // 4. Testimonials (Approved Reviews)
        $reviews = \App\Models\ServiceReview::approved()
            ->with('user') // Assuming user has name/avatar, or we use review's name/avatar
            ->latest()
            ->limit(3)
            ->get();

        // 5. Catalog (All active services for the bottom grid)
        $catalogServices = \App\Models\Service::active()
            ->ordered()
            // Exclude the ones already shown in featured if desired, or just show all
            ->limit(8)
            ->with([
                'pricingPlans' => function ($query) {
                    $query->orderBy('price', 'asc');
                }
            ])
            ->get();

        return view('home', compact(
            'featuredServices',
            'comparison',
            'comparisonServices',
            'comparisonFeatures',
            'features',
            'reviews',
            'catalogServices'
        ));
    }

}
