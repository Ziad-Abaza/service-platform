<?php

namespace App\Filament\Resources\ServicePricingPlans\Pages;

use App\Filament\Resources\ServicePricingPlans\ServicePricingPlanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditServicePricingPlan extends EditRecord
{
    protected static string $resource = ServicePricingPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
