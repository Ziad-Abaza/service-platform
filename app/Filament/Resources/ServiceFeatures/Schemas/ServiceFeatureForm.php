<?php

namespace App\Filament\Resources\ServiceFeatures\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceFeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('service_id')
                    ->required()
                    ->numeric(),
                TextInput::make('feature_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
