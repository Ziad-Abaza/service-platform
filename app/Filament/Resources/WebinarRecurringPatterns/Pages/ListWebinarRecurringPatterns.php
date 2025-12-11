<?php

namespace App\Filament\Resources\WebinarRecurringPatterns\Pages;

use App\Filament\Resources\WebinarRecurringPatterns\WebinarRecurringPatternResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWebinarRecurringPatterns extends ListRecords
{
    protected static string $resource = WebinarRecurringPatternResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
