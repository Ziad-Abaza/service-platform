<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Filament\Facades\Filament;

class FilamentAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('filament.admin.auth.login');
        }

        // Check if user can access Filament panel
        $user = auth()->user();
        if (!$user->canAccessPanel(Filament::getCurrentPanel())) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
