<x-filament-panels::layout.base :livewire="$this">
    {{-- 1. The Background Image --}}
    <div class="fixed inset-0 z-[-1] h-full w-full bg-cover bg-center" 
         style="background-image: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop');">
         {{-- You can replace the URL above with: asset('images/login-bg.jpg') --}}
    </div>

    {{-- 2. Dark Overlay (makes text readable) --}}
    <div class="fixed inset-0 z-[-1] h-full w-full bg-black/40"></div>

    {{-- 3. The Container --}}
    <div class="flex min-h-screen items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
        
        {{-- 4. The Glass Card --}}
        <div class="w-full max-w-md space-y-8 rounded-2xl border border-white/10 bg-white/10 p-10 shadow-2xl backdrop-blur-xl dark:bg-black/40">
            
            {{-- Logo / Title --}}
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-white">
                    Welcome Back
                </h2>
                <p class="mt-2 text-sm text-gray-200">
                    Sign in to your account
                </p>
            </div>

            {{-- The Actual Login Form --}}
            {{ $this->form }}
            
            {{-- Footer Actions (Register/Forgot Password links if enabled) --}}
            <div class="text-center text-sm text-gray-300">
                {{ $this->registerAction }}
            </div>
        </div>
    </div>
    
    {{-- CSS Overrides specifically for this form to make inputs look good on glass --}}
    <style>
        /* Make form labels white */
        .fi-fo-field-wrp-label span {
            color: white !important;
        }
        /* Make input backgrounds semi-transparent white */
        input.fi-input {
            background-color: rgba(255, 255, 255, 0.1) !important;
            border-color: rgba(255, 255, 255, 0.2) !important;
            color: white !important;
        }
        /* Fix placeholder color */
        input.fi-input::placeholder {
            color: rgba(255, 255, 255, 0.6) !important;
        }
        /* Adjust the "Remember Me" text */
        .fi-checkbox-input + span {
            color: #e5e7eb !important; /* gray-200 */
        }
    </style>
</x-filament-panels::layout.base>