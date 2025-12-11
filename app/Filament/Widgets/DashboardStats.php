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
        $activeServicesCount = Service::where('is_active', true)->count();
        $activeCategoriesCount = Category::where('is_active', true)->count();
        $approvedReviewsCount = ServiceReview::where('status', 'approved')->count();
        $pendingReviewsCount = ServiceReview::where('status', 'pending')->count();
        
        return [
            Stat::make(__('models.services'), Service::count())
                ->description($activeServicesCount . ' ' . __('models.active'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),
            
            Stat::make(__('models.categories'), Category::count())
                ->description($activeCategoriesCount . ' ' . __('models.active'))
                ->descriptionIcon('heroicon-m-folder')
                ->color('success'),
            
            Stat::make(__('models.reviews'), ServiceReview::count())
                ->description($approvedReviewsCount . ' ' . __('models.approved'))
                ->descriptionIcon('heroicon-m-star')
                ->chart([3, 5, 2, 8, 4, 6, 9])
                ->color('warning'),
            
            Stat::make(__('models.pending_reviews'), $pendingReviewsCount)
                ->description(__('models.awaiting_moderation'))
                ->descriptionIcon('heroicon-m-clock')
                ->color('danger'),
        ];
    }
}
