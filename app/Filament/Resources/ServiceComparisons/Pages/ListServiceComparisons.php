<?php

namespace App\Filament\Resources\ServiceComparisons\Pages;

use App\Filament\Resources\ServiceComparisons\ServiceComparisonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceComparisons extends ListRecords
{
    protected static string $resource = ServiceComparisonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
