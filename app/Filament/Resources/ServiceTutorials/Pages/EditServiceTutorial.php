<?php

namespace App\Filament\Resources\ServiceTutorials\Pages;

use App\Filament\Resources\ServiceTutorials\ServiceTutorialResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceTutorial extends EditRecord
{
    protected static string $resource = ServiceTutorialResource::class;

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
