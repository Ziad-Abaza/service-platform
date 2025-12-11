<?php

namespace App\Filament\Resources\ServiceDocuments\Pages;

use App\Filament\Resources\ServiceDocuments\ServiceDocumentResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\CreateAction;

class ListServiceDocuments extends ListRecords
{
    protected static string $resource = ServiceDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label(__('common.create')),
        ];
    }
}
