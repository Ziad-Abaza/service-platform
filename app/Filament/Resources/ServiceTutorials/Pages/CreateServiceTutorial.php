<?php

namespace App\Filament\Resources\ServiceTutorials\Pages;

use App\Filament\Resources\ServiceTutorials\ServiceTutorialResource;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceTutorial extends CreateRecord
{
    protected static string $resource = ServiceTutorialResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
