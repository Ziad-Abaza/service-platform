<?php

namespace App\Filament\Resources\ServiceTutorials\Pages;

use App\Filament\Resources\ServiceTutorials\ServiceTutorialResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\CreateAction;

class ListServiceTutorials extends ListRecords
{
    protected static string $resource = ServiceTutorialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label(__('common.create')),
        ];
    }
}
