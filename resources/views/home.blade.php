@extends('layouts.landing')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-600 to-purple-600 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
                Your Complete E-Commerce Solution
            </h1>
            <p class="text-lg md:text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Success Online + Remote + Purchases
            </p>
            <div class="flex justify-center gap-4">
                <a href="#"
                    class="px-8 py-3 bg-white text-purple-600 font-semibold rounded-[20px] shadow-lg hover:bg-gray-100 transition duration-300">
                    Get Started
                </a>
                <a href="#"
                    class="px-8 py-3 border-2 border-white text-white font-semibold rounded-[20px] hover:bg-white hover:text-purple-600 transition duration-300">
                    Contact Sales
                </a>
            </div>
        </div>

        <!-- Decorative shapes can be added here -->
    </div>

    <!-- Services Section -->
    <div class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Services</h2>
                <p class="text-gray-600">Choose from our comprehensive range of e-commerce solutions tailored for you.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Custom Build -->
                <div
                    class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:-translate-y-1 transition duration-300">
                    <div class="p-1 bg-gradient-to-r from-blue-500 to-purple-600"></div>
                    <div class="p-8">
                        <div class="h-12 w-12 bg-blue-100 rounded-lg flex items-center justify-center mb-6 text-blue-600">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Custom Build</h3>
                        <p class="text-sm text-gray-500 mb-6">Perfect for businesses needing a unique solution.</p>

                        <div class="mb-6">
                            <span class="text-4xl font-bold text-gray-900">$5,000</span>
                            <span class="text-gray-500">/ one-time</span>
                        </div>

                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Full Source Code Ownership
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Custom Design & Branding
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                3 Months of Support
                            </li>
                        </ul>

                        <a href="#"
                            class="block w-full py-3 px-6 bg-purple-600 hover:bg-purple-700 text-white font-bold text-center rounded-lg transition duration-200">
                            Get Quote
                        </a>
                    </div>
                </div>

                <!-- Rental Store -->
                <div
                    class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:-translate-y-1 transition duration-300 border-2 border-green-500 relative">
                    <div class="absolute top-0 right-0 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">
                        POPULAR</div>
                    <div class="p-8">
                        <div class="h-12 w-12 bg-green-100 rounded-lg flex items-center justify-center mb-6 text-green-600">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72l1.189-1.19A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Rental Store</h3>
                        <p class="text-sm text-gray-500 mb-6">Start small, grow fast with our rental model.</p>

                        <div class="mb-6">
                            <span class="text-4xl font-bold text-gray-900">$99</span>
                            <span class="text-gray-500">/ month</span>
                        </div>

                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                50+ Premium Templates
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Hosting Included
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                24/7 Support
                            </li>
                        </ul>

                        <a href="#"
                            class="block w-full py-3 px-6 bg-green-500 hover:bg-green-600 text-white font-bold text-center rounded-lg transition duration-200">
                            Start Free Trial
                        </a>
                    </div>
                </div>

                <!-- Purchase Source -->
                <div
                    class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:-translate-y-1 transition duration-300">
                    <div class="p-1 bg-gradient-to-r from-pink-500 to-rose-500"></div>
                    <div class="p-8">
                        <div class="h-12 w-12 bg-pink-100 rounded-lg flex items-center justify-center mb-6 text-pink-600">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Purchase Source</h3>
                        <p class="text-sm text-gray-500 mb-6">Get the code and host it yourself.</p>

                        <div class="mb-6">
                            <span class="text-4xl font-bold text-gray-900">$1,099</span>
                            <span class="text-gray-500">/ one-time</span>
                        </div>

                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Complete Source Code
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Self-Hosted Freedom
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Standard Support
                            </li>
                        </ul>

                        <a href="#"
                            class="block w-full py-3 px-6 bg-pink-500 hover:bg-pink-600 text-white font-bold text-center rounded-lg transition duration-200">
                            Buy Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Comparison Section -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Compare Our Services</h2>
                <p class="text-gray-600">See the endless options to help your business</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="p-4 text-left border-b-2 border-gray-100 min-w-[200px]">Features</th>
                            <th class="p-4 text-center border-b-2 border-gray-100 text-blue-600 font-semibold min-w-[150px]">Custom Build</th>
                            <th class="p-4 text-center border-b-2 border-gray-100 text-green-500 font-semibold min-w-[150px]">Rental Store</th>
                            <th class="p-4 text-center border-b-2 border-gray-100 text-purple-600 font-semibold min-w-[150px]">Purchase Source</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $features = [
                                ['Hosting Included', false, true, false],
                                ['Setup Time', '2 Weeks', '24 Hours', 'Instant'],
                                ['Custom Domain', true, false, true],
                                ['Premium Templates', true, true, true],
                                ['API Integrations', true, false, true],
                                ['Full Source Code', true, false, true],
                                ['Advanced Analytics', true, true, true],
                                ['Priority Support', true, true, false],
                            ];
                        @endphp
                        
                        @foreach($features as $index => $feature)
                        <tr class="{{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }}">
                            <td class="p-4 text-gray-700 font-medium">{{ $feature[0] }}</td>
                            <td class="p-4 text-center">
                                @if(is_bool($feature[1]))
                                    @if($feature[1])
                                        <svg class="w-5 h-5 text-green-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    @else
                                        <svg class="w-5 h-5 text-red-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    @endif
                                @else
                                    <span class="text-sm text-gray-600 font-semibold">{{ $feature[1] }}</span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                @if(is_bool($feature[2]))
                                    @if($feature[2])
                                        <svg class="w-5 h-5 text-green-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    @else
                                        <svg class="w-5 h-5 text-red-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    @endif
                                @else
                                    <span class="text-sm text-gray-600 font-semibold">{{ $feature[2] }}</span>
                                @endif
                            </td>
                             <td class="p-4 text-center">
                                @if(is_bool($feature[3]))
                                    @if($feature[3])
                                        <svg class="w-5 h-5 text-green-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    @else
                                        <svg class="w-5 h-5 text-red-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    @endif
                                @else
                                    <span class="text-sm text-gray-600 font-semibold">{{ $feature[3] }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Why Choose StoreHub -->
    <div class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Choose StoreHub?</h2>
                <p class="text-gray-600">Automate your business with the best solutions in the market.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition text-center">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Fast Setup</h3>
                    <p class="text-gray-500 text-sm">Get your store up and running in record time.</p>
                </div>
                 <!-- Feature 2 -->
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition text-center">
                    <div class="w-12 h-12 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Secure Payments</h3>
                    <p class="text-gray-500 text-sm">Integrated with top payment gateways globally.</p>
                </div>
                 <!-- Feature 3 -->
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition text-center">
                    <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2">24/7 Support</h3>
                    <p class="text-gray-500 text-sm">Our team is always here to help you succeed.</p>
                </div>
                 <!-- Feature 4 -->
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition text-center">
                    <div class="w-12 h-12 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Data Driven</h3>
                    <p class="text-gray-500 text-sm">Advanced analytics to grow your business.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Section -->
    <div class="py-20 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-600">Got questions? We've got answers.</p>
            </div>

            <div class="space-y-4">
                <!-- FAQ 1 -->
                <details class="group bg-gray-50 p-6 rounded-lg [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer font-medium text-gray-900">
                        What's the difference between Custom Build and Rental?
                        <svg class="ml-1.5 h-5 w-5 flex-shrink-0 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 leading-relaxed text-gray-700">
                        Custom Build gives you full ownership of the source code and a unique design tailored to your brand. Rental provides a managed hosted solution with templates, perfect for starting quickly without technical overhead.
                    </p>
                </details>

                 <!-- FAQ 2 -->
                <details class="group bg-gray-50 p-6 rounded-lg [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer font-medium text-gray-900">
                        Can I switch plans later?
                        <svg class="ml-1.5 h-5 w-5 flex-shrink-0 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 leading-relaxed text-gray-700">
                        Yes! You can upgrade from Rental to Custom Build or Purchase Source at any time. Our team will help migrate your data.
                    </p>
                </details>

                 <!-- FAQ 3 -->
                <details class="group bg-gray-50 p-6 rounded-lg [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer font-medium text-gray-900">
                        Do you offer hosting support?
                        <svg class="ml-1.5 h-5 w-5 flex-shrink-0 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 leading-relaxed text-gray-700">
                        Yes, our Rental plan includes fully managed hosting. For Custom Build and Purchase Source, we can recommend preferred hosting partners or assist with setup.
                    </p>
                </details>

                 <!-- FAQ 4 -->
                <details class="group bg-gray-50 p-6 rounded-lg [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer font-medium text-gray-900">
                         Is there a refund policy?
                        <svg class="ml-1.5 h-5 w-5 flex-shrink-0 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 leading-relaxed text-gray-700">
                        For Rental plans, you can cancel anytime. For one-time purchases (Custom Build, Purchase Source), refunds are evaluated on a case-by-case basis due to the nature of digital goods.
                    </p>
                </details>
            </div>
        </div>
    </div>


    <!-- Testimonials Section -->
    <div class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">What Our Customers Say</h2>
                <p class="text-gray-600">Hear from businesses that trust StoreHub.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Review 1 -->
                <div class="bg-white p-8 rounded-xl shadow-sm">
                    <div class="flex items-center mb-4">
                         <div class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold mr-3">
                            JD
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">John Doe</h4>
                            <p class="text-xs text-gray-500">CEO, TechStore</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-4">
                        ★★★★★
                    </div>
                    <p class="text-gray-600 text-sm">"StoreHub transformed our online presence. The custom build was exactly what we needed to scale."</p>
                </div>

                <!-- Review 2 -->
                <div class="bg-white p-8 rounded-xl shadow-sm">
                    <div class="flex items-center mb-4">
                         <div class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold mr-3">
                            SM
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Sarah Miller</h4>
                            <p class="text-xs text-gray-500">Founder, BoutiqueMode</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-4">
                        ★★★★★
                    </div>
                    <p class="text-gray-600 text-sm">"The rental model is a lifesaver for small startups. Low cost but premium features. Highly recommended!"</p>
                </div>

                <!-- Review 3 -->
                <div class="bg-white p-8 rounded-xl shadow-sm">
                    <div class="flex items-center mb-4">
                         <div class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold mr-3">
                            RW
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Mike Williams</h4>
                            <p class="text-xs text-gray-500">Director, ElectronicsHub</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-4">
                        ★★★★★
                    </div>
                    <p class="text-gray-600 text-sm">"Purchasing the source code gave us the control we needed for our enterprise integrations. Great code quality."</p>
                </div>
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
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Browse Our Services</h2>
                <p class="text-gray-600">Explore our curated list of potential products & services.</p>
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
                @for ($i = 0; $i < 4; $i++)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="h-40 bg-gray-200 w-full object-cover relative">
                       <!-- Placeholder Image -->
                       <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                           <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                       </div>
                       <span class="absolute top-2 right-2 bg-red-500 text-white text-xs px-2 py-1 rounded">Sale</span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 mb-1">Product Title {{ $i+1 }}</h3>
                        <div class="flex text-yellow-400 text-xs mb-2">★★★★★</div>
                         <p class="text-sm text-gray-500 mb-3 truncate">Short description of the product goes here.</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-purple-600">$120</span>
                            <button class="bg-purple-600 text-white text-xs px-3 py-1 rounded hover:bg-purple-700">View</button>
                        </div>
                    </div>
                </div>
                @endfor
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
           <h2 class="text-3xl font-bold text-white mb-4">Ready to Start Your E-Commerce Journey?</h2>
           <p class="text-blue-100 mb-8 text-lg">Join thousands of successful entrepreneurs using StoreHub.</p>
           <a href="#" class="inline-block bg-white text-purple-600 px-8 py-3 rounded-lg font-bold shadow-lg hover:bg-gray-100 transition duration-300">
               Get Started Today
           </a>
        </div>
    </div>
@endsection


