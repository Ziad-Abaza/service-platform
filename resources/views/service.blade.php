@extends('layouts.landing')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 fade-in">
                    {{ $service->name }}
                </h1>
                <p class="text-xl mb-8 fade-in opacity-90">
                    {{ $service->short_description }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center fade-in">
                    <button onclick="scrollToPricing()"
                        class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        {{ __('service.buttons.get_started') }}
                    </button>
                    <button onclick="contactSales()"
                        class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition-colors">
                        {{ __('service.buttons.contact_sales') }}
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Details Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Left Column - Images and Media -->
                <div>
                    <!-- Main Image -->
                    <div class="mb-4">
                        @if($images->isNotEmpty())
                            <img id="mainImage" src="{{ $images->first()->getUrl() }}" alt="{{ $service->name }}"
                                class="w-full h-96 object-cover rounded-lg">
                        @else
                            <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                                <i class="fas fa-image text-gray-400 text-4xl"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Thumbnail Gallery -->
                    <div id="thumbnailGallery" class="grid grid-cols-4 gap-2 mb-6">
                        @foreach($images as $image)
                            <img src="{{ $image->getUrl() }}" alt="{{ $service->name }} thumbnail"
                                class="w-full h-20 object-cover rounded cursor-pointer hover:opacity-75 transition-opacity"
                                onclick="document.getElementById('mainImage').src='{{ $image->getUrl() }}'">
                        @endforeach
                    </div>

                    <!-- Video Gallery -->
                    @if($videos->isNotEmpty())
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold mb-4">{{ __('service.details.videos') }}</h3>
                            <div id="serviceVideos" class="grid grid-cols-2 gap-4">
                                @foreach($videos as $video)
                                    <div class="relative">
                                        <video controls class="w-full h-40 rounded-lg">
                                            <source src="{{ $video->getUrl() }}" type="{{ $video->mime_type }}">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right Column - Details -->
                <div>
                    <!-- Service Name and Description -->
                    <h2 id="serviceDetailsName" class="text-3xl font-bold text-gray-800 mb-4">{{ $service->name }}</h2>
                    <div id="serviceDetailsDescription" class="text-gray-600 mb-6 prose">
                        {!! nl2br(e($service->short_description)) !!}
                    </div>

                    <!-- Price -->
                    <div class="mb-6">
                        <div class="flex items-baseline">
                            <span id="serviceDetailsPrice" class="text-4xl font-bold text-indigo-600">
                                {{ number_format($lowestPrice, 2) }}
                            </span>
                            <span class="text-gray-600 ml-2">{{ __('service.details.starting_price') }}</span>
                        </div>
                    </div>

                    <!-- Features -->
                    @if($service->features->count() > 0)
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold mb-4">{{ __('service.details.key_features') }}</h3>
                            <div id="serviceFeatures" class="space-y-2">
                                @foreach($service->features as $serviceFeature)
                                    <div class="flex items-center">
                                        <i class="fas fa-check text-green-500 mr-2"></i>
                                        <span class="text-gray-700">
                                            {{ $serviceFeature->feature->name ?? $serviceFeature->id }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Pricing Tiers -->
                    @if($service->pricingPlans->count() > 0)
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold mb-4">{{ __('service.details.choose_plan') }}</h3>
                            <div id="servicePricing" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($service->pricingPlans as $plan)
                                    <div
                                        class="border border-gray-200 rounded-lg p-4 hover:border-indigo-500 transition-colors {{ $plan->popular ? 'ring-2 ring-indigo-500' : '' }}">
                                        <div class="flex justify-between items-start mb-2">
                                            <h4 class="font-semibold text-gray-800">{{ $plan->name }}</h4>
                                            @if($plan->popular)
                                                <span
                                                    class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">{{ __('service.common.popular') }}</span>
                                            @endif
                                        </div>
                                        <p class="text-2xl font-bold text-indigo-600 mb-2">{{ number_format($plan->price, 2) }}</p>
                                        <button onclick="selectPlan('{{ $plan->id }}')"
                                            class="w-full bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition-colors">
                                            {{ $plan->button_text ?: __('service.buttons.select') }}
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex space-x-4 mb-8">
                        <button onclick="contactSales()"
                            class="flex-1 bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition-colors font-medium">
                            {{ __('service.buttons.contact_sales') }}
                        </button>
                        <button onclick="scheduleDemo()"
                            class="flex-1 border border-indigo-600 text-indigo-600 px-6 py-3 rounded-lg hover:bg-indigo-50 transition-colors font-medium">
                            {{ __('service.buttons.schedule_demo') }}
                        </button>
                    </div>

                    <!-- Trust Indicators -->
                    <div class="border-t pt-6">
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div>
                                <div class="text-2xl font-bold text-indigo-600">24/7</div>
                                <div class="text-sm text-gray-600">{{ __('service.trust.support') }}</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-green-600">100%</div>
                                <div class="text-sm text-gray-600">{{ __('service.trust.satisfaction') }}</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-purple-600">30 Days</div>
                                <div class="text-sm text-gray-600">{{ __('service.trust.money_back') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Service Tabs -->
            <div class="mt-16">
                <!-- Tab Navigation -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="relative">
                        <!-- Animated Tab Indicator -->
                        <div id="tabIndicator"
                            class="absolute bottom-0 h-1 bg-gradient-to-r from-indigo-500 to-purple-600 transition-all duration-300 ease-out shadow-lg">
                        </div>
                        <nav class="flex overflow-x-auto scrollbar-hide px-4 pt-1" role="tablist"
                            aria-label="Service information tabs">
                            <button onclick="showServiceTab('specifications')"
                                class="service-tab-button group relative flex-1 min-w-[140px] px-6 py-4 text-center font-medium text-sm transition-all duration-300 ease-in-out border-b-2 border-indigo-500 text-indigo-600 bg-gradient-to-b from-indigo-50 to-transparent hover:from-indigo-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400 focus-visible:ring-offset-2 rounded-t-lg shadow-sm hover:shadow-md"
                                data-tab="specifications" role="tab" aria-selected="true"
                                aria-controls="service-specifications">
                                <div class="flex items-center justify-center space-x-2">
                                    <i class="fas fa-cog text-indigo-500 group-hover:text-indigo-700 transition-colors"></i>
                                    <span class="relative group-hover:font-semibold transition-all">{{ __('service.tabs.specifications') }}</span>
                                    <span class="absolute -right-1 -top-1 h-2 w-2">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                                    </span>
                                </div>
                            </button>

                            <button onclick="showServiceTab('details')"
                                class="service-tab-button group relative flex-1 min-w-[140px] px-6 py-4 text-center font-medium text-sm transition-all duration-300 ease-in-out border-b-2 border-transparent text-gray-600 hover:text-indigo-600 hover:border-indigo-300 hover:bg-indigo-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400 focus-visible:ring-offset-2 rounded-t-lg hover:shadow-sm"
                                data-tab="details" role="tab" aria-selected="false" aria-controls="service-details"
                                tabindex="-1">
                                <div class="flex items-center justify-center space-x-2">
                                    <i class="fas fa-info-circle text-gray-500 group-hover:text-indigo-500 transition-colors"></i>
                                    <span class="relative group-hover:font-medium transition-all">{{ __('service.tabs.details') }}</span>
                                </div>
                            </button>

                            <button onclick="showServiceTab('reviews')"
                                class="service-tab-button group relative flex-1 min-w-[140px] px-6 py-4 text-center font-medium text-sm transition-all duration-300 ease-in-out border-b-2 border-transparent text-gray-600 hover:text-amber-600 hover:border-amber-300 hover:bg-amber-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:ring-offset-2 rounded-t-lg hover:shadow-sm"
                                data-tab="reviews" role="tab" aria-selected="false" aria-controls="service-reviews"
                                tabindex="-1">
                                <div class="flex items-center justify-center space-x-2">
                                    <i class="fas fa-star text-amber-400 group-hover:text-amber-500 transition-colors"></i>
                                    <span class="relative group-hover:font-medium transition-all">{{ __('service.tabs.reviews') }}</span>
                                    <span class="absolute -right-1 -top-1 h-5 w-5 flex items-center justify-center">
                                        <span class="absolute inline-flex h-3 w-3 rounded-full bg-amber-400 opacity-75 group-hover:animate-ping"></span>
                                        <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-500"></span>
                                    </span>
                                </div>
                            </button>

                            <button onclick="showServiceTab('support')"
                                class="service-tab-button group relative flex-1 min-w-[140px] px-6 py-4 text-center font-medium text-sm transition-all duration-300 ease-in-out border-b-2 border-transparent text-gray-600 hover:text-emerald-600 hover:border-emerald-300 hover:bg-emerald-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400 focus-visible:ring-offset-2 rounded-t-lg hover:shadow-sm"
                                data-tab="support" role="tab" aria-selected="false" aria-controls="service-support"
                                tabindex="-1">
                                <div class="flex items-center justify-center space-x-2">
                                    <i class="fas fa-question-circle text-emerald-500 group-hover:text-emerald-600 transition-colors"></i>
                                    <span class="relative group-hover:font-medium transition-all">{{ __('service.tabs.support') }}</span>
                                </div>
                            </button>

                            <button onclick="showServiceTab('learning')"
                                class="service-tab-button group relative flex-1 min-w-[140px] px-6 py-4 text-center font-medium text-sm transition-all duration-300 ease-in-out border-b-2 border-transparent text-gray-600 hover:text-blue-600 hover:border-blue-300 hover:bg-blue-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-400 focus-visible:ring-offset-2 rounded-t-lg hover:shadow-sm"
                                data-tab="learning" role="tab" aria-selected="false" aria-controls="service-learning"
                                tabindex="-1">
                                <div class="flex items-center justify-center space-x-2">
                                    <i class="fas fa-graduation-cap text-blue-500 group-hover:text-blue-600 transition-colors"></i>
                                    <span class="relative group-hover:font-medium transition-all">{{ __('service.tabs.learning') }}</span>
                                    <span class="absolute -right-1 -top-1">
                                        <span class="relative flex h-3 w-3">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500"></span>
                                        </span>
                                    </span>
                                </div>
                            </button>
                        </nav>
                    </div>
                </div>

                <!-- Enhanced Service Tab Content -->
            <div class="mt-8 relative">
                <!-- Loading Overlay -->
                <div id="tabLoadingOverlay"
                    class="absolute inset-0 bg-white/80 backdrop-blur-sm z-10 flex items-center justify-center rounded-xl hidden">
                    <div class="flex items-center space-x-3">
                        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600"></div>
                        <span class="text-gray-600 font-medium">Loading...</span>
                    </div>
                </div>

                <!-- Tab Content Container -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 transition-all duration-300">
                    <!-- Enhanced Specifications Tab -->
                    <div id="service-specifications"
                        class="service-tab-content active opacity-0 transform translate-y-4 transition-all duration-300">
                        <div class="mb-6">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="p-3 bg-indigo-100 rounded-lg">
                                    <i class="fas fa-cog text-indigo-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-xl text-gray-800">{{
                                        __('service.specifications.technical') }}</h4>
                                    <p class="text-gray-600 text-sm">Technical specifications and system requirements
                                    </p>
                                </div>
                            </div>
                            <div id="serviceTechSpecs" class="grid gap-4">
                                @foreach($service->features as $feature)
                                <div class="p-4 bg-gray-50 rounded-lg">
                                    <h5 class="font-semibold text-gray-800 mb-1">
                                        {{ $feature->feature->name ?? $feature->id }}
                                    </h5>
                                    @if($feature->feature->description)
                                    <p class="text-sm text-gray-600">{{ $feature->feature->description }}</p>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="border-t pt-6">
                            <!-- Performance Metrics (Hardcoded for now as per design requirement) -->
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="p-3 bg-green-100 rounded-lg">
                                    <i class="fas fa-tachometer-alt text-green-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-xl text-gray-800">{{
                                        __('service.specifications.performance') }}</h4>
                                </div>
                            </div>
                            <div class="grid gap-4">
                                <div
                                    class="flex justify-between items-center p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-lg hover:shadow-md transition-all duration-200 group">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="p-2 bg-green-100 rounded-full group-hover:scale-110 transition-transform duration-200">
                                            <i class="fas fa-bolt text-green-600 text-sm"></i>
                                        </div>
                                        <span class="text-gray-700 font-medium">{{
                                            __('service.performance.response_time') }}</span>
                                    </div>
                                    <span class="font-bold text-green-600 bg-green-50 px-3 py-1 rounded-full">&lt;
                                        500ms</span>
                                </div>

                                <div
                                    class="flex justify-between items-center p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-lg hover:shadow-md transition-all duration-200 group">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="p-2 bg-blue-100 rounded-full group-hover:scale-110 transition-transform duration-200">
                                            <i class="fas fa-server text-blue-600 text-sm"></i>
                                        </div>
                                        <span class="text-gray-700 font-medium">{{
                                            __('service.performance.uptime') }}</span>
                                    </div>
                                    <span class="font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">99.9%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Additional Details Tab -->
                    <div id="service-details"
                        class="service-tab-content opacity-0 transform translate-y-4 transition-all duration-300">
                        <div class="prose max-w-none">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="p-3 bg-blue-100 rounded-lg">
                                    <i class="fas fa-info-circle text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-xl text-gray-800">{{
                                        __('service.details.overview') }}</h4>
                                    <p class="text-gray-600 text-sm">Comprehensive information about this service</p>
                                </div>
                            </div>
                            <div id="serviceDetailedDescription"
                                class="text-gray-700 leading-relaxed mb-8 p-4 bg-blue-50 rounded-lg border-l-4 border-blue-200">
                                {!! nl2br(e($service->description)) !!}
                            </div>
                            
                            <!-- Static What's Included & Integration Section kept as per request -->
                             <div class="mb-8">
                                <div class="flex items-center space-x-3 mb-6">
                                    <div class="p-3 bg-green-100 rounded-lg">
                                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-xl text-gray-800">{{
                                            __('service.details.whats_included') }}</h4>
                                        <p class="text-gray-600 text-sm">Everything you get with this service</p>
                                    </div>
                                </div>
                                <ul class="grid md:grid-cols-2 gap-3 mb-6">
                                    <li class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                        <i class="fas fa-check text-green-500 font-bold"></i>
                                        <span class="text-gray-700">{{ __('service.included.source_code') }}</span>
                                    </li>
                                    <li class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                        <i class="fas fa-check text-green-500 font-bold"></i>
                                        <span class="text-gray-700">{{ __('service.included.documentation') }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews Tab -->
                    <div id="service-reviews" class="service-tab-content">
                        <div class="mb-8">
                            <div class="flex items-center justify-between mb-6">
                                <h4 class="font-semibold text-lg">{{ __('service.reviews.customer_reviews') }}
                                </h4>
                                <!-- Load More button could be implemented with AJAX later if needed -->
                            </div>
                            <div id="serviceReviewsList" class="grid md:grid-cols-2 gap-6">
                                @forelse($service->reviews->where('status', 'approved') as $review)
                                <div class="bg-gray-50 p-6 rounded-lg">
                                    <div class="flex items-center mb-4">
                                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 font-bold mr-3">
                                            {{ substr($review->name ?? 'U', 0, 1) }}
                                        </div>
                                        <div>
                                            <h5 class="font-semibold text-gray-800">{{ $review->name }}</h5>
                                            <div class="flex text-yellow-400 text-sm">
                                                @for($i = 0; $i < 5; $i++)
                                                    @if($i < $review->rating)
                                                    <i class="fas fa-star"></i>
                                                    @else
                                                    <i class="far fa-star text-gray-300"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600">{{ $review->comment }}</p>
                                    <p class="text-xs text-gray-400 mt-2">{{ $review->created_at->diffForHumans() }}</p>
                                </div>
                                @empty
                                <div class="col-span-2 text-center text-gray-500 py-8">
                                    {{ __('service.reviews.no_reviews') }}
                                </div>
                                @endforelse
                            </div>
                        </div>

                        <div class="border-t pt-8">
                            <h4 class="font-semibold text-lg mb-4">{{ __('service.reviews.write_review') }}
                            </h4>
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <!-- Review form kept static for UI -->
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2">{{
                                        __('service.reviews.rating') }}</label>
                                    <div class="flex space-x-2">
                                        <button class="text-2xl text-gray-300 hover:text-yellow-400">★</button>
                                        <button class="text-2xl text-gray-300 hover:text-yellow-400">★</button>
                                        <button class="text-2xl text-gray-300 hover:text-yellow-400">★</button>
                                        <button class="text-2xl text-gray-300 hover:text-yellow-400">★</button>
                                        <button class="text-2xl text-gray-300 hover:text-yellow-400">★</button>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2">{{
                                        __('service.reviews.your_review') }}</label>
                                    <textarea
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        rows="4"
                                        placeholder="{{ __('service.reviews.review_placeholder') }}"></textarea>
                                </div>
                                <button
                                    class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                                    {{ __('service.reviews.submit_review') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Support & Documentation Tab -->
                    <div id="service-support" class="service-tab-content">
                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h4 class="font-semibold text-lg mb-4">{{ __('service.support.documentation')
                                    }}</h4>
                                <div class="space-y-3">
                                    @forelse($service->documents as $document)
                                    <a href="{{ $document->file_url }}" target="_blank"
                                        class="flex items-center justify-between p-3 bg-gray-50 rounded hover:bg-gray-100 cursor-pointer transition-colors">
                                        <div class="flex items-center">
                                            <i class="fas fa-file-alt text-indigo-600 mr-3"></i>
                                            <span class="text-gray-700">{{ $document->title }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-xs text-gray-500 mr-2">{{ $document->formatted_file_size }}</span>
                                            <i class="fas fa-download text-gray-400"></i>
                                        </div>
                                    </a>
                                    @empty
                                    <p class="text-gray-500 italic">{{ __('service.common.no_records') }}</p>
                                    @endforelse
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg mb-4">{{ __('service.support.get_help') }}
                                </h4>
                                <div class="space-y-4">
                                    <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <i class="fas fa-headset text-indigo-600 mr-2"></i>
                                            <h5 class="font-semibold text-indigo-800">{{ __('service.support.live_chat') }}</h5> 
                                        </div>
                                        <p class="text-gray-700 mb-3">{{ __('service.support.chat_description')
                                            }}</p>
                                        <button onclick="startLiveChat()"
                                            class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition-colors">
                                            {{ __('service.buttons.start_chat') }}
                                        </button>
                                    </div>
                                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <i class="fas fa-envelope text-green-600 mr-2"></i>
                                            <h5 class="font-semibold text-green-800">{{
        __('service.support.email_support') }}</h5>
                                        </div>
                                        <p class="text-gray-700 mb-3">{{
        __('service.support.email_description') }}</p>
                                        <a href="mailto:support@storehub.com"
                                            class="text-green-600 hover:text-green-700 font-medium">
                                            support@storehub.com
                                        </a>
                                    </div>
                                    <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                                        <div class="flex items-center mb-2">
                                            <i class="fas fa-phone text-purple-600 mr-2"></i>
                                            <h5 class="font-semibold text-purple-800">{{
        __('service.support.phone_support') }}</h5>
                                        </div>
                                        <p class="text-gray-700 mb-3">{{
        __('service.support.phone_description') }}</p>
                                        <a href="tel:1-800-STORE-HUB"
                                            class="text-purple-600 hover:text-purple-700 font-medium">
                                            1-800-STORE-HUB
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video Learning Tab -->
                    <div id="service-learning" class="service-tab-content">
                        <div class="mb-8">
                            <h4 class="font-semibold text-lg mb-4">{{ __('service.learning.video_tutorials') }}
                            </h4>
                            <div id="serviceVideoTutorials" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @forelse($service->tutorials as $tutorial)
                                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                                    <div class="relative h-40 bg-gray-100">
                                        @if($tutorial->video_thumbnail)
                                        <img src="{{ $tutorial->video_thumbnail }}" alt="{{ $tutorial->title }}" class="w-full h-full object-cover">
                                        @else
                                        <div class="flex items-center justify-center h-full text-indigo-300">
                                            <i class="fas fa-play-circle text-4xl"></i>
                                        </div>
                                        @endif
                                        <div class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-1 rounded">
                                            {{ $tutorial->formatted_duration }}
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <h5 class="font-semibold text-gray-800 mb-1 line-clamp-1">{{ $tutorial->title }}</h5>
                                        <p class="text-sm text-gray-600 line-clamp-2 mb-3">{{ $tutorial->description }}</p>
                                        <a href="{{ $tutorial->video_url }}" target="_blank" class="text-indigo-600 text-sm font-medium hover:underline">
                                            {{ __('service.buttons.watch_tutorial') }}
                                        </a>
                                    </div>
                                </div>
                                @empty
                                <div class="col-span-3 text-center text-gray-500 py-8">
                                    {{ __('service.common.no_records') }}
                                </div>
                                @endforelse
                            </div>
                        </div>

                        <div class="border-t pt-8">
                            <h4 class="font-semibold text-lg mb-4">{{ __('service.learning.webinars') }}</h4>
                            <div class="grid md:grid-cols-2 gap-6">
                                @forelse($service->webinars as $webinar)
                                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-lg p-6">
                                    <div class="flex items-center mb-3">
                                        <i class="fas fa-video text-2xl mr-3"></i>
                                        <h5 class="font-semibold text-lg">{{ $webinar->title }}</h5>
                                    </div>
                                    <p class="mb-4 opacity-90 line-clamp-2">{{ $webinar->description }}</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm opacity-75">{{ $webinar->schedule_date->format('M d, Y H:i') }}</span>
                                        <a href="{{ $webinar->registration_url }}" target="_blank"
                                            class="bg-white text-indigo-600 px-4 py-2 rounded font-medium hover:bg-gray-100 transition-colors">
                                            {{ __('service.buttons.register') }}
                                        </a>
                                    </div>
                                </div>
                                @empty
                                <div class="col-span-2 text-center text-gray-500 py-8">
                                    {{ __('service.common.no_records') }}
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </section>

@endsection

@push('service-tabs-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Define showServiceTab in the global scope so it's available for onclick handlers
            window.showServiceTab = function(tabName) {
                // Update tab buttons
                const tabButtons = document.querySelectorAll('.service-tab-button');
                tabButtons.forEach(button => {
                    const isActive = button.getAttribute('data-tab') === tabName;
                    button.setAttribute('aria-selected', isActive);
                    button.setAttribute('tabindex', isActive ? '0' : '-1');
                    
                    // Update button styles
                    if (isActive) {
                        button.classList.add('border-indigo-500', 'text-indigo-600', 'bg-indigo-50/50');
                        button.classList.remove('border-transparent', 'text-gray-500');
                        updateTabIndicator(button);
                    } else {
                        button.classList.remove('border-indigo-500', 'text-indigo-600', 'bg-indigo-50/50');
                        button.classList.add('border-transparent', 'text-gray-500');
                    }
                });

                // Update tab contents with smooth transitions
                const tabContents = document.querySelectorAll('.service-tab-content');
                tabContents.forEach(content => {
                    if (content.id === `service-${tabName}`) {
                        content.classList.add('active');
                        content.style.display = 'block';
                        // Trigger reflow
                        void content.offsetHeight;
                        content.style.opacity = '1';
                        content.style.transform = 'translateY(0)';
                    } else {
                        content.style.opacity = '0';
                        content.style.transform = 'translateY(10px)';
                        // Remove active class after transition
                        setTimeout(() => {
                            if (content.id !== `service-${tabName}`) {
                                content.classList.remove('active');
                                content.style.display = 'none';
                            }
                        }, 150);
                    }
                });

                // Update URL hash without page jump
                if (history.pushState) {
                    const newUrl = window.location.pathname + '#' + tabName;
                    window.history.pushState({ path: newUrl }, '', newUrl);
                }
            }

            // Update the tab indicator position
            function updateTabIndicator(activeButton) {
                const indicator = document.getElementById('tabIndicator');
                if (indicator && activeButton) {
                    const buttonRect = activeButton.getBoundingClientRect();
                    const parentRect = activeButton.parentElement.parentElement.getBoundingClientRect();
                    indicator.style.width = `${buttonRect.width}px`;
                    indicator.style.left = `${buttonRect.left - parentRect.left}px`;
                    indicator.style.opacity = '1';
                }
            }

            // Initialize first tab as active
            if (document.querySelector('.service-tab-button')) {
                showServiceTab('specifications');
            }
        });
    </script>
@endpush