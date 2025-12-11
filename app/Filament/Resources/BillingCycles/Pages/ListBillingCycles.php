<?php

namespace App\Filament\Resources\BillingCycles\Pages;

use App\Filament\Resources\BillingCycles\BillingCycleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBillingCycles extends ListRecords
{
    protected static string $resource = BillingCycleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('actions.create') . ' ' . __('models.billing_cycle')),
        ];
    }
}
