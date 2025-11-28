<?php

namespace App\Providers\Filament;

use Filament\PanelProvider;
use Filament\Panel;

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
            ->brandName('Service Dashboard')
            ->navigationGroups([
                'Services',
                'Content Management',
                'Settings',
            ]);
    }
}
