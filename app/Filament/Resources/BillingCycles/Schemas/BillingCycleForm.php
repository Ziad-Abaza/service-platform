<?php

namespace App\Filament\Resources\BillingCycles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BillingCycleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->label(__('models.name'))
                ->required()
                ->maxLength(255),
        ]);
    }
}
