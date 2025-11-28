{{-- resources/views/vendor/filament/{panel-id}/pages/auth/login.blade.php --}}

<x-filament-panels::page.simple>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-6">

        {{-- Logo --}}
        <div class="mb-8">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-20">
        </div>

        <div class="w-full max-w-md bg-white shadow-xl rounded-xl p-8">

            <h2 class="text-2xl font-bold text-center mb-6">
                Welcome Back
            </h2>

            <form method="POST" action="{{ route('filament.{panel-id}.auth.login') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input
                        type="email"
                        name="email"
                        required
                        autofocus
                        class="w-full mt-1 px-4 py-2 rounded-lg border focus:border-primary-500 focus:ring-1 focus:ring-primary-500 outline-none"
                        placeholder="Enter your email"
                    >
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-sm font-medium">Password</label>
                    <input
                        type="password"
                        name="password"
                        required
                        class="w-full mt-1 px-4 py-2 rounded-lg border focus:border-primary-500 focus:ring-1 focus:ring-primary-500 outline-none"
                        placeholder="Enter your password"
                    >
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" name="remember" class="rounded">
                        Remember me
                    </label>
                </div>

                {{-- Login button --}}
                <button
                    type="submit"
                    class="w-full bg-primary-600 hover:bg-primary-700 text-white py-2 rounded-lg font-semibold transition"
                >
                    Login
                </button>
            </form>

        </div>

        {{-- Footer --}}
        <p class="text-sm text-gray-500 mt-6">
            © {{ date('Y') }} Service Platform — All rights reserved.
        </p>

    </div>
</x-filament-panels::page.simple>
