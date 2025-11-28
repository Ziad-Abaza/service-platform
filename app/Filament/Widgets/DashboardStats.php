<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Service;
use App\Models\Category;
use App\Models\ServiceReview;

class DashboardStats extends BaseWidget
{
    protected static ?int $sort = 1;
    
    protected int | string | array $columnSpan = 'full';
    
    protected function getStats(): array
    {
        return [
            Stat::make('Total Services', Service::count())
                ->description(Service::where('is_active', true)->count() . ' active')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),
            
            Stat::make('Categories', Category::count())
                ->description(Category::where('is_active', true)->count() . ' active')
                ->descriptionIcon('heroicon-m-folder')
                ->color('success'),
            
            Stat::make('Total Reviews', ServiceReview::count())
                ->description(ServiceReview::where('status', 'approved')->count() . ' approved')
                ->descriptionIcon('heroicon-m-star')
                ->chart([3, 5, 2, 8, 4, 6, 9])
                ->color('warning'),
            
            Stat::make('Pending Reviews', ServiceReview::where('status', 'pending')->count())
                ->description('Awaiting moderation')
                ->descriptionIcon('heroicon-m-clock')
                ->color('danger'),
        ];
    }
}
