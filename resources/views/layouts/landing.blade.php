<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
    class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    
    @stack('service-tabs-scripts')
</head>

<body class="font-sans antialiased text-gray-900 bg-gray-50 pt-16">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav x-data="{ open: false }" class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-100 shadow-sm">
            <!-- Add a subtle shadow when scrolled -->
            <div x-data="{ scrolled: false }" 
                 @scroll.window="scrolled = window.scrollY > 10"
                 :class="{ 'shadow-md': scrolled }"
                 class="transition-shadow duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center justify-between w-full">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('home') }}"
                                class="font-bold text-xl md:text-2xl text-purple-600 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-7 h-7 md:w-8 md:h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72l1.189-1.19A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                </svg>
                                <span class="hidden sm:inline">StoreHub</span>
                            </a>
                        </div>

                        <!-- Desktop Navigation -->
                        <div class="hidden sm:flex sm:items-center sm:space-x-2 sm:ml-10">
                            <a href="#"
                                class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-purple-600 hover:bg-gray-50 rounded-md transition-colors duration-200">
                                {{ __('landing.nav.product') }}
                            </a>
                            <a href="#"
                                class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-purple-600 hover:bg-gray-50 rounded-md transition-colors duration-200">
                                {{ __('landing.nav.pricing') }}
                            </a>
                            <a href="#"
                                class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-purple-600 hover:bg-gray-50 rounded-md transition-colors duration-200">
                                {{ __('landing.nav.resources') }}
                            </a>
                        </div>

                        <!-- Mobile menu button -->
                        <div class="flex items-center sm:hidden">
                            <button @click="open = !open" type="button"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 transition-colors"
                                aria-controls="mobile-menu" :aria-expanded="open ? 'true' : 'false'">
                                <span class="sr-only">Open main menu</span>
                                <svg x-show="!open" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                <svg x-show="open" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Desktop Auth & Language -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-3">
                        <div class="flex items-center space-x-1">
                            @if(app()->getLocale() == 'en')
                                <a href="{{ route('locale.switch', 'ar') }}"
                                    class="text-sm text-gray-700 hover:text-purple-600 px-3 py-2 rounded-md hover:bg-gray-50 transition-colors duration-200">
                                    العربية
                                </a>
                            @else
                                <a href="{{ route('locale.switch', 'en') }}"
                                    class="text-sm text-gray-700 hover:text-purple-600 px-3 py-2 rounded-md hover:bg-gray-50 transition-colors duration-200">
                                    English
                                </a>
                            @endif
                        </div>

                        <div class="border-l border-gray-200 h-6"></div>

                        <a href="{{ route('login') }}"
                            class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-medium text-xs text-white uppercase tracking-wider hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200">
                            {{ __('landing.nav.login') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state -->
            <div x-show="open" @click.away="open = false" class="sm:hidden" id="mobile-menu">
                <div class="pt-2 pb-3 space-y-1 bg-white border-t border-gray-200">
                    <a href="#"
                        class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-purple-600 hover:bg-gray-50 border-b border-gray-100">
                        {{ __('landing.nav.product') }}
                    </a>
                    <a href="#"
                        class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-purple-600 hover:bg-gray-50 border-b border-gray-100">
                        {{ __('landing.nav.pricing') }}
                    </a>
                    <a href="#"
                        class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-purple-600 hover:bg-gray-50 border-b border-gray-100">
                        {{ __('landing.nav.resources') }}
                    </a>
                    <div class="px-4 py-3 border-b border-gray-100">
                        <div class="flex items-center space-x-4">
                            <span class="text-sm font-medium text-gray-500">{{ __('landing.nav.language') }}:</span>
                            @if(app()->getLocale() == 'en')
                                <a href="{{ route('locale.switch', 'ar') }}"
                                    class="text-sm font-medium text-purple-600 hover:text-purple-700">
                                    العربية
                                </a>
                            @else
                                <a href="{{ route('locale.switch', 'en') }}"
                                    class="text-sm font-medium text-purple-600 hover:text-purple-700">
                                    English
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="px-4 py-3">
                        <a href="{{ route('login') }}"
                            class="w-full flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            {{ __('landing.nav.login') }}
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-slate-900 text-white pt-16 pb-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Main Footer Content -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                    <!-- Brand Info -->
                    <div class="lg:col-span-1">
                        <div class="flex items-center gap-3 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8 text-purple-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72l1.189-1.19A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                            </svg>
                            <span class="font-bold text-2xl bg-gradient-to-r from-purple-400 to-pink-600 bg-clip-text text-transparent">StoreHub</span>
                        </div>
                        <p class="text-slate-400 text-sm mb-6">
                            {{ __('landing.footer.description') }}
                        </p>
                        <!-- Social Icons -->
                        <div class="flex space-x-4">
                            <a href="#" class="text-slate-400 hover:text-white transition-colors duration-200">
                                <span class="sr-only">Twitter</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-slate-400 hover:text-white transition-colors duration-200">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-slate-400 hover:text-white transition-colors duration-200">
                                <span class="sr-only">Instagram</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-slate-400 hover:text-white transition-colors duration-200">
                                <span class="sr-only">GitHub</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.699 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-6">{{ __('landing.footer.services') }}</h4>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-base text-slate-400 hover:text-white transition-colors duration-200">Custom Build</a></li>
                            <li><a href="#" class="text-base text-slate-400 hover:text-white transition-colors duration-200">Rental Store</a></li>
                            <li><a href="#" class="text-base text-slate-400 hover:text-white transition-colors duration-200">Purchase Source</a></li>
                            <li><a href="#" class="text-base text-slate-400 hover:text-white transition-colors duration-200">API Documentation</a></li>
                            <li><a href="#" class="text-base text-slate-400 hover:text-white transition-colors duration-200">Guides</a></li>
                        </ul>
                    </div>

                    <!-- Company -->
                    <div>
                        <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-6">{{ __('landing.footer.company') }}</h4>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-base text-slate-400 hover:text-white transition-colors duration-200">About Us</a></li>
                            <li><a href="#" class="text-base text-slate-400 hover:text-white transition-colors duration-200">Blog</a></li>
                            <li><a href="#" class="text-base text-slate-400 hover:text-white transition-colors duration-200">Careers</a></li>
                            <li><a href="#" class="text-base text-slate-400 hover:text-white transition-colors duration-200">Customers</a></li>
                            <li><a href="#" class="text-base text-slate-400 hover:text-white transition-colors duration-200">Brand</a></li>
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div class="lg:col-span-1">
                        <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-6">Subscribe to our newsletter</h4>
                        <p class="text-slate-400 text-sm mb-4">The latest news, articles, and resources, sent to your inbox weekly.</p>
                        <form class="space-y-3">
                            <div>
                                <label for="email" class="sr-only">Email address</label>
                                <input id="email" name="email" type="email" autocomplete="email" required 
                                    class="w-full px-4 py-2 border border-slate-600 bg-slate-800 rounded-md text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" 
                                    placeholder="Enter your email">
                            </div>
                            <button type="submit" 
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-slate-800 mt-12 pt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <p class="text-sm text-slate-400">&copy; {{ date('Y') }} StoreHub. {{ __('landing.footer.rights_reserved') }}</p>
                        <div class="flex space-x-6 mt-4 md:mt-0">
                            <a href="#" class="text-slate-400 hover:text-white text-sm transition-colors duration-200">Privacy Policy</a>
                            <a href="#" class="text-slate-400 hover:text-white text-sm transition-colors duration-200">Terms of Service</a>
                            <a href="#" class="text-slate-400 hover:text-white text-sm transition-colors duration-200">Cookie Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>