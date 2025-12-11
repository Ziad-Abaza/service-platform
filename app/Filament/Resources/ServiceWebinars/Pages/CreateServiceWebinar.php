<?php

namespace App\Filament\Resources\ServiceWebinars\Pages;

use App\Filament\Resources\ServiceWebinars\ServiceWebinarResource;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceWebinar extends CreateRecord
{
    protected static string $resource = ServiceWebinarResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
