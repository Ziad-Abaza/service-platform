<?php

namespace App\Filament\Resources\ServicePricingPlans\Pages;

use App\Filament\Resources\ServicePricingPlans\ServicePricingPlanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServicePricingPlans extends ListRecords
{
    protected static string $resource = ServicePricingPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
