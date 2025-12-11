<?php

namespace App\Filament\Resources\BillingCycles\Pages;

use App\Filament\Resources\BillingCycles\BillingCycleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBillingCycle extends EditRecord
{
    protected static string $resource = BillingCycleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterSave(): void
    {
        // Add any post-update logic here
    }
}
