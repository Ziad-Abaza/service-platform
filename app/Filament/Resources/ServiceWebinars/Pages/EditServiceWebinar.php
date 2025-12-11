<?php

namespace App\Filament\Resources\ServiceWebinars\Pages;

use App\Filament\Resources\ServiceWebinars\ServiceWebinarResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceWebinar extends EditRecord
{
    protected static string $resource = ServiceWebinarResource::class;

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
