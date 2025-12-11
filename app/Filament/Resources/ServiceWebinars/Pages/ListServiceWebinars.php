<?php

namespace App\Filament\Resources\ServiceWebinars\Pages;

use App\Filament\Resources\ServiceWebinars\ServiceWebinarResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\CreateAction;

class ListServiceWebinars extends ListRecords
{
    protected static string $resource = ServiceWebinarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label(__('common.create')),
        ];
    }
}
