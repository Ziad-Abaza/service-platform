<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceComparison;
use App\Models\ComparisonService;
use Illuminate\Database\Seeder;

class ServiceComparisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have some services
        $services = Service::inRandomOrder()->limit(3)->get();

        if ($services->isEmpty()) {
            return;
        }

        // Create a Comparison
        $comparison = ServiceComparison::create([
            'name_en' => 'Starter vs Pro vs Enterprise',
            'name_ar' => 'مقارنة الخطط',
            'description_en' => 'Detailed comparison of our top services.',
            'description_ar' => 'مقارنة تفصيلية لأفضل خدماتنا.',
            'is_active' => true,
        ]);

        // Features to compare
        $features = [
            'price' => ['Starter' => '$299', 'Pro' => '$599', 'Enterprise' => '$999'],
            'delivery_time' => ['Starter' => '1 week', 'Pro' => '3 days', 'Enterprise' => '1 day'],
            'revisions' => ['Starter' => '2', 'Pro' => 'Unlimited', 'Enterprise' => 'Unlimited'],
            'support' => ['Starter' => 'Email', 'Pro' => '24/7 Chat', 'Enterprise' => 'Dedicated Agent'],
            'mobile_app' => ['Starter' => 'No', 'Pro' => 'Yes', 'Enterprise' => 'Yes'],
        ];

        foreach ($services as $index => $service) {
            // Deterministic random data for each service based on index
            $planType = match ($index) {
                0 => 'Starter',
                1 => 'Pro',
                default => 'Enterprise',
            };

            $comparisonData = [
                'price' => $features['price'][$planType],
                'delivery_time' => $features['delivery_time'][$planType],
                'revisions' => $features['revisions'][$planType],
                'support' => $features['support'][$planType],
                'mobile_app' => $features['mobile_app'][$planType],
            ];

            ComparisonService::create([
                'comparison_id' => $comparison->id,
                'service_id' => $service->id,
                'comparison_data' => $comparisonData,
            ]);
        }
    }
}
