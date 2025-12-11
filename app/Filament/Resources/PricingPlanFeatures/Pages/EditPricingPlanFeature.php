<?php

namespace App\Filament\Resources\PricingPlanFeatures\Pages;

use App\Filament\Resources\PricingPlanFeatures\PricingPlanFeatureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPricingPlanFeature extends EditRecord
{
    protected static string $resource = PricingPlanFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()->label(__('common.delete')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
