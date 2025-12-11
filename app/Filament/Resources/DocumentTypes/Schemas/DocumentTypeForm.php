<?php

namespace App\Filament\Resources\DocumentTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class DocumentTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make(__('filament.basic_information'))
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextInput::make('name_ar')
                                ->label(__('models.name_ar'))
                                ->required(),
                            TextInput::make('name_en')
                                ->label(__('models.name_en'))
                                ->required(),
                        ]),
                ]),
        ]);
    }
}
