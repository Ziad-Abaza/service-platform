<?php

namespace App\Filament\Resources\Features\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class FeatureForm
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
            Section::make(__('filament.description'))
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Textarea::make('description_ar')
                                ->label(__('models.description_ar'))
                                ->rows(4),
                            Textarea::make('description_en')
                                ->label(__('models.description_en'))
                                ->rows(4),
                        ]),
                ]),
            Section::make(__('filament.media'))
                ->schema([
                    FileUpload::make('logo')
                        ->label(__('models.logo'))
                        ->image()
                        ->disk('public')
                        ->directory('features/logos')
                        ->visibility('public')
                        ->maxSize(2048)
                        ->columnSpanFull(),
                ]),
            Section::make(__('filament.settings'))
                ->schema([
                    TextInput::make('sort_order')
                        ->label(__('models.sort_order'))
                        ->numeric()
                        ->default(0),
                ]),
        ]);
    }
}
