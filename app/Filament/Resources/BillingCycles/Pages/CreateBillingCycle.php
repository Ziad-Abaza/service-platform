<?php

namespace App\Filament\Resources\BillingCycles\Pages;

use App\Filament\Resources\BillingCycles\BillingCycleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBillingCycle extends CreateRecord
{
    protected static string $resource = BillingCycleResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        // Add any post-creation logic here
    }
}
