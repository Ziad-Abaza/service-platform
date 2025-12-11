<?php

namespace App\Filament\Resources\ServiceDocuments\Pages;

use App\Filament\Resources\ServiceDocuments\ServiceDocumentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceDocument extends CreateRecord
{
    protected static string $resource = ServiceDocumentResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
