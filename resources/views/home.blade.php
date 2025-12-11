@extends('layouts.landing')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-600 to-purple-600 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
                {{ __('landing.hero.title') }}
            </h1>
            <p class="text-lg md:text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                {{ __('landing.hero.subtitle') }}
            </p>
            <div class="flex justify-center gap-4">
                <a href="#"
                    class="px-8 py-3 bg-white text-purple-600 font-semibold rounded-[20px] shadow-lg hover:bg-gray-100 transition duration-300">
                    {{ __('landing.hero.get_started') }}
                </a>
                <a href="#"
                    class="px-8 py-3 border-2 border-white text-white font-semibold rounded-[20px] hover:bg-white hover:text-purple-600 transition duration-300">
                    {{ __('landing.hero.contact_sales') }}
                </a>
            </div>
        </div>

        <!-- Decorative shapes can be added here -->
    </div>

    <!-- Pricing Plans Section -->
    <div class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('landing.sections.pricing_title') }}</h2>
                <p class="text-gray-600">{{ __('landing.sections.pricing_subtitle') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredServices as $index => $plan)
                    @php
                        // Determine color theme based on index or logic
                        $theme = match($index) {
                            0 => 'purple',
                            1 => 'green',
                            2 => 'pink',
                            default => 'purple'
                        };
                        
                        $bgColor = match($theme) {
                            'purple' => 'bg-purple-600',
                            'green' => 'bg-green-500',
                            'pink' => 'bg-gradient-to-r from-purple-500 to-pink-500',
                        };

                        $textColor = match($theme) {
                            'purple' => 'text-purple-600',
                            'green' => 'text-green-600',
                            'pink' => 'text-pink-600',
                        };

                         $borderColor = match($theme) {
                            'purple' => 'border-purple-600',
                            'green' => 'border-green-500',
                            'pink' => 'border-pink-500',
                        };
                        
                        // Badge Logic
                        $badgeBg = match($theme) {
                             'purple' => 'bg-white/20 text-white',
                             'green' => 'bg-white/20 text-white',
                             'pink' => 'bg-white/20 text-white',
                        };
                    @endphp

                    <div class="flex flex-col h-full rounded-2xl shadow-xl overflow-hidden transform hover:-translate-y-1 transition duration-300 bg-white">
                        <!-- Header Section -->
                        <div class="{{ $bgColor }} p-8 text-white relative">
                            @if($plan->badge)
                                <div class="absolute top-6 right-6 {{ $badgeBg }} text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                                    {{ $plan->badge }}
                                </div>
                            @endif

                            <div class="h-12 w-12 bg-white/20 rounded-lg flex items-center justify-center mb-6">
                                  @if($plan->service && $plan->service->logo_url)
                                    <img src="{{ $plan->service->logo_url }}" alt="{{ $plan->service->name }}" class="h-8 w-8 object-contain filter brightness-0 invert">
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                                    </svg>
                                @endif
                            </div>

                            <h3 class="text-2xl font-bold mb-2">{{ $plan->name }}</h3>
                            <p class="text-white/80 text-sm h-10 overflow-hidden">{{ $plan->description }}</p>
                        </div>

                        <!-- Price Section -->
                        <div class="p-8 pb-4 flex-grow">
                            <div class="mb-6">
                                <span class="text-4xl font-bold text-gray-900">${{ number_format($plan->price, 0) == $plan->price ? number_format($plan->price, 0) : $plan->price }}</span>
                                <span class="text-gray-500 ml-1">{{ $plan->billing_period }}</span>
                            </div>

                             <!-- Highlight Text (e.g. Custom quote based on requirements) -->
                            @if($plan->highlight_text)
                                <p class="text-sm text-gray-500 mb-6">{{ $plan->highlight_text }}</p>
                            @else
                                <div class="mb-6 h-5"></div> 
                            @endif

                             <!-- Features -->
                            <ul class="space-y-4 mb-8">
                                @foreach($plan->pricingPlanFeatures as $planFeature)
                                    <li class="flex items-start text-sm text-gray-600">
                                        <svg class="w-5 h-5 {{ $textColor }} mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        <span>{{ $planFeature->feature->name ?? '' }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Footer/Action Section -->
                        <div class="p-8 pt-0 mt-auto">
                            <a href="{{ $plan->button_link ?? '#' }}" class="block w-full py-3 px-6 {{ $bgColor }} hover:opacity-90 text-white font-bold text-center rounded-lg transition duration-200">
                                {{ $plan->button_text }}
                            </a>
                            
                            @if($plan->second_button_text)
                                <a href="{{ $plan->second_button_link ?? '#' }}" class="mt-4 block w-full py-3 px-6 border {{ $borderColor }} {{ $textColor }} font-bold text-center rounded-lg hover:bg-gray-50 transition duration-200">
                                    {{ $plan->second_button_text }}
                                </a>
                            @endif
                            
                            <!-- Small footer text if needed -->
                             @if($theme === 'purple')
                                <div class="mt-4 text-center text-xs text-gray-400 flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    4-8 weeks delivery
                                </div>
                            @elseif($theme === 'green')
                                <div class="mt-4 text-center text-xs text-gray-400 flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                     Setup in 24 hours
                                </div>
                            @elseif($theme === 'pink')
                                 <div class="mt-4 text-center text-xs text-gray-400 flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    30-day money-back guarantee
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Comparison Section -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('landing.sections.compare_title') }}</h2>
                <p class="text-gray-600">{{ __('landing.sections.compare_subtitle') }}</p>
            </div>

            @if($comparison)
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="p-4 text-left border-b-2 border-gray-100 min-w-[200px]">Features</th>
                                @foreach($comparisonServices as $service)
                                    <th class="p-4 text-center border-b-2 border-gray-100 font-semibold min-w-[150px] {{ $loop->last ? 'text-purple-600' : 'text-blue-600' }}">
                                        {{ $service->name }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comparisonFeatures as $index => $featureKey)
                                <tr class="{{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }}">
                                    <td class="p-4 text-gray-700 font-medium">{{ ucfirst(str_replace('_', ' ', $featureKey)) }}</td>
                                    @foreach($comparisonServices as $service)
                                        @php
                                            // Find the pivot entry for this service in this comparison
                                            $pivot = $comparison->comparisonServices->where('service_id', $service->id)->first();
                                            $value = $pivot && $pivot->comparison_data ? ($pivot->comparison_data[$featureKey] ?? '-') : '-';
                                        @endphp
                                        <td class="p-4 text-center">
                                            @if(is_bool($value) || $value === 'true' || $value === 'false')
                                                @if($value === true || $value === 'true')
                                                    <svg class="w-5 h-5 text-green-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                @else
                                                    <svg class="w-5 h-5 text-red-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                @endif
                                            @else
                                                <span class="text-sm text-gray-600 font-semibold">{{ $value }}</span>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- Why Choose StoreHub -->
    <div class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('landing.sections.why_choose_title') }}</h2>
                <p class="text-gray-600">{{ __('landing.sections.why_choose_subtitle') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                @foreach($features as $feature)
                    <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition text-center">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            @if($feature->logo_url)
                                 <img src="{{ $feature->logo_url }}" class="w-6 h-6 object-contain" alt="">
                            @else
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            @endif
                        </div>
                        <h3 class="font-bold text-lg mb-2">{{ $feature->name }}</h3>
                        <p class="text-gray-500 text-sm">{{ $feature->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- FAQ Section -->
    <div class="py-20 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('landing.sections.faq_title') }}</h2>
                <p class="text-gray-600">{{ __('landing.sections.faq_subtitle') }}</p>
            </div>

            <div class="space-y-4">
                <!-- FAQ 1 -->
                <details class="group bg-gray-50 p-6 rounded-lg [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer font-medium text-gray-900">
                        {{ __('landing.sections.faq.q1') }}
                        <svg class="ml-1.5 h-5 w-5 flex-shrink-0 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 leading-relaxed text-gray-700">
                        {{ __('landing.sections.faq.a1') }}
                    </p>
                </details>

                 <!-- FAQ 2 -->
                <details class="group bg-gray-50 p-6 rounded-lg [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer font-medium text-gray-900">
                        {{ __('landing.sections.faq.q2') }}
                        <svg class="ml-1.5 h-5 w-5 flex-shrink-0 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 leading-relaxed text-gray-700">
                        {{ __('landing.sections.faq.a2') }}
                    </p>
                </details>

                 <!-- FAQ 3 -->
                <details class="group bg-gray-50 p-6 rounded-lg [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer font-medium text-gray-900">
                        {{ __('landing.sections.faq.q3') }}
                        <svg class="ml-1.5 h-5 w-5 flex-shrink-0 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 leading-relaxed text-gray-700">
                        {{ __('landing.sections.faq.a3') }}
                    </p>
                </details>

                 <!-- FAQ 4 -->
                <details class="group bg-gray-50 p-6 rounded-lg [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer font-medium text-gray-900">
                         {{ __('landing.sections.faq.q4') }}
                        <svg class="ml-1.5 h-5 w-5 flex-shrink-0 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 leading-relaxed text-gray-700">
                        {{ __('landing.sections.faq.a4') }}
                    </p>
                </details>
            </div>
        </div>
    </div>


    <!-- Testimonials Section -->
    <div class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('landing.sections.testimonials_title') }}</h2>
                <p class="text-gray-600">{{ __('landing.sections.testimonials_subtitle') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($reviews as $review)
                    <div class="bg-white p-8 rounded-xl shadow-sm">
                        <div class="flex items-center mb-4">
                             @if($review->avatar_url)
                                <img src="{{ $review->avatar_url }}" class="h-10 w-10 rounded-full mr-3 object-cover" alt="">
                             @else
                                <div class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold mr-3">
                                    {{ substr($review->name, 0, 2) }}
                                </div>
                             @endif
                            <div>
                                <h4 class="font-bold text-gray-900">{{ $review->name }}</h4>
                                <p class="text-xs text-gray-500">{{ $review->user->email ?? '' }}</p>
                            </div>
                        </div>
                        <div class="flex text-yellow-400 mb-4">
                            @for($i = 0; $i < $review->rating; $i++)
                                ★
                            @endfor
                        </div>
                        <p class="text-gray-600 text-sm">"{{ $review->comment }}"</p>
                    </div>
                @endforeach
            </div>
             <div class="mt-12 flex justify-center space-x-8 text-center bg-white p-6 rounded-lg shadow-sm max-w-4xl mx-auto">
                <div>
                     <span class="block text-2xl font-bold text-purple-600">10,000+</span>
                     <span class="text-xs text-gray-500">Active Stores</span>
                </div>
                 <div>
                     <span class="block text-2xl font-bold text-green-500">$50M+</span>
                     <span class="text-xs text-gray-500">Revenue Generated</span>
                </div>
                 <div>
                     <span class="block text-2xl font-bold text-blue-500">98%</span>
                     <span class="text-xs text-gray-500">Customer Satisfaction</span>
                </div>
                 <div>
                     <span class="block text-2xl font-bold text-orange-500">24/7</span>
                     <span class="text-xs text-gray-500">Support Available</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Section -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('landing.sections.browse_services_title') }}</h2>
                <p class="text-gray-600">{{ __('landing.sections.browse_services_subtitle') }}</p>
            </div>

            <!-- Filters Mockup -->
            <div class="flex flex-col md:flex-row gap-4 mb-8">
                <div class="relative flex-grow">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" placeholder="Search items..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500">
                </div>
                <select class="md:w-48 py-2 border border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 bg-white">
                    <option>All Countries</option>
                    <option>USA</option>
                    <option>Canada</option>
                </select>
                <select class="md:w-48 py-2 border border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 bg-white">
                    <option>Returns</option>
                    <option>Free Returns</option>
                    <option>No Returns</option>
                </select>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($catalogServices as $service)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <div class="h-40 bg-gray-200 w-full object-cover relative">
                           <!-- Placeholder Image -->
                            @if($service->banner_url)
                                <img src="{{ $service->banner_url }}" class="w-full h-full object-cover" alt="{{ $service->name }}">
                            @else
                                   <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                                       <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                   </div>
                               @endif

                           @if($service->pricingPlans->isNotEmpty() && $service->pricingPlans->where('popular', true)->count() > 0)
                               <span class="absolute top-2 right-2 bg-red-500 text-white text-xs px-2 py-1 rounded">Popular</span>
                           @endif
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-1">{{ $service->name }}</h3>
                            <div class="flex text-yellow-400 text-xs mb-2">★★★★★</div>
                             <p class="text-sm text-gray-500 mb-3 truncate">{{ $service->short_description }}</p>
                            <div class="flex justify-between items-center">
                                @if($service->pricingPlans->isNotEmpty())
                                    <span class="font-bold text-purple-600">${{ $service->pricingPlans->first()->price }}</span>
                                @else
                                    <span class="font-bold text-purple-600">Custom</span>
                                @endif
                                <button class="bg-purple-600 text-white text-xs px-3 py-1 rounded hover:bg-purple-700">View</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                 <a href="#" class="px-8 py-3 bg-purple-600 text-white font-semibold rounded-lg shadow-lg hover:bg-purple-700 transition duration-300">
                    Load More Items
                </a>
            </div>
        </div>
    </div>

    <!-- Final CTA Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 py-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
           <h2 class="text-3xl font-bold text-white mb-4">{{ __('landing.sections.ready_title') }}</h2>
           <p class="text-blue-100 mb-8 text-lg">{{ __('landing.sections.ready_subtitle') }}</p>
           <a href="#" class="inline-block bg-white text-purple-600 px-8 py-3 rounded-lg font-bold shadow-lg hover:bg-gray-100 transition duration-300">
               {{ __('landing.sections.get_started_today') }}
           </a>
        </div>
    </div>
@endsection


