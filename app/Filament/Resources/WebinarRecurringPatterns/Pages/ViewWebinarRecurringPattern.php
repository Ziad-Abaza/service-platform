<?php

namespace App\Filament\Resources\WebinarRecurringPatterns\Pages;

use App\Filament\Resources\WebinarRecurringPatterns\WebinarRecurringPatternResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewWebinarRecurringPattern extends ViewRecord
{
    protected static string $resource = WebinarRecurringPatternResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
