<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show($slug)
    {
        $service = Service::with([
            'category',
            'features.feature',
            'pricingPlans.features',
            'reviews',
            'tutorials',
            'webinars',
            'documents',
            'media'
        ])
            ->where('slug', $slug)
            ->active()
            ->firstOrFail();

        // Get all service images
        $images = $service->getMedia('service_images');
        $videos = $service->getMedia('service_videos');

        // Calculate starting price
        $lowestPrice = $service->pricingPlans->where('price', '>', 0)->min('price') ?? 0;

        // Prepare data for the view
        $data = [
            'title' => $service->name,
            'description' => $service->short_description,
            'service' => $service,
            'images' => $images,
            'videos' => $videos,
            'lowestPrice' => $lowestPrice,
            'primaryButton' => [
                'text' => __('messages.service.buttons.get_started'),
                'action' => 'scrollToPricing()',
                'class' => 'bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors'
            ],
            'secondaryButton' => [
                'text' => __('messages.service.buttons.contact_sales'),
                'action' => 'contactSales()',
                'class' => 'border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition-colors'
            ],
            'containerClass' => 'container mx-auto px-4',
            'contentClass' => 'text-center max-w-3xl mx-auto',
            'gradientClass' => 'bg-gradient-to-r from-indigo-600 to-purple-600'
        ];

        return view('service', $data);
    }
}
