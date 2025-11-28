<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;

class FilamentAuthenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        // Exclude authentication routes
        if ($request->is('dashboard/login') || $request->is('dashboard/logout')) {
            return $next($request);
        }

        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Check if user can access Filament panel
        $user = auth()->user();
        if (!$user->canAccessPanel(\Filament\Facades\Filament::getCurrentPanel())) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
