<?php

namespace App\Filament\Resources\PricingPlanFeatures\Pages;

use App\Filament\Resources\PricingPlanFeatures\PricingPlanFeatureResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\CreateAction;

class ListPricingPlanFeatures extends ListRecords
{
    protected static string $resource = PricingPlanFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label(__('common.create')),
        ];
    }
}
