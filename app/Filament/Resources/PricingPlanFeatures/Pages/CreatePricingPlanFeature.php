<?php

namespace App\Filament\Resources\PricingPlanFeatures\Pages;

use App\Filament\Resources\PricingPlanFeatures\PricingPlanFeatureResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePricingPlanFeature extends CreateRecord
{
    protected static string $resource = PricingPlanFeatureResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
