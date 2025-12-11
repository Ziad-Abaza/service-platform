<?php

namespace App\Filament\Resources\WebinarRecurringPatterns\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class WebinarRecurringPatternForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('type')
                    ->required(),
                \Filament\Forms\Components\TagsInput::make('days_of_week')
                    ->placeholder('Add days (e.g., Monday, Tuesday)')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('day_of_month')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
