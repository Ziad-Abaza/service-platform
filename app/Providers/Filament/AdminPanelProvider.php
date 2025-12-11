<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('dashboard')
            ->login()
            ->colors([
                'primary' => '#fbbf24',
                'danger' => '#dc2626',
                'success' => '#16a34a',
                'warning' => '#f59e0b',
                'info' => '#0ea5e9',
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->middleware([
                'web',
                'filament.auth',
            ])
            ->authGuard('web')
            ->brandName(__('navigation.dashboard'))
            ->navigationGroups([
                __('navigation.services'),
                __('navigation.content_management'),
                __('navigation.settings'),
            ])
            ->userMenuItems([
                // Language switcher بدون أيقونة
                'language' => MenuItem::make()
                    ->label(fn() => app()->getLocale() === 'ar' ? '🇸🇦 ' . __('navigation.arabic') : '🇬🇧 ' . __('navigation.english'))
                    ->url(fn() => app()->getLocale() === 'ar' ? '/locale/en' : '/locale/ar')
                    ->sort(-1),

                // User profile
                'profile' => MenuItem::make()
                    ->label(fn() => auth()->user()->name ?? __('navigation.user'))
                    ->icon('heroicon-o-user')
                    ->url('/admin/profile')
                    ->sort(0),
            ]);
    }
}
