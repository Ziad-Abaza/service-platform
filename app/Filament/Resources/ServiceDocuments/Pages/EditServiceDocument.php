<?php

namespace App\Filament\Resources\ServiceDocuments\Pages;

use App\Filament\Resources\ServiceDocuments\ServiceDocumentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceDocument extends EditRecord
{
    protected static string $resource = ServiceDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()->label(__('common.delete')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
