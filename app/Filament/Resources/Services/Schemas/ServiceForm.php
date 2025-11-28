<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                            ]),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name_ar')
                                    ->label('Arabic Name')
                                    ->required(),
                                TextInput::make('name_en')
                                    ->label('English Name')
                                    ->required(),
                            ]),
                    ]),
                Section::make('Descriptions')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Textarea::make('short_description_ar')
                                    ->label('Arabic Short Description')
                                    ->rows(3),
                                Textarea::make('short_description_en')
                                    ->label('English Short Description')
                                    ->rows(3),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Textarea::make('description_ar')
                                    ->label('Arabic Description')
                                    ->rows(5),
                                Textarea::make('description_en')
                                    ->label('English Description')
                                    ->rows(5),
                            ]),
                    ]),
                Section::make('Media')
                    ->schema([
                        FileUpload::make('logo')
                            ->image()
                            ->directory('services/logos')
                            ->maxSize(2048)
                            ->columnSpanFull(),
                        FileUpload::make('banner')
                            ->image()
                            ->directory('services/banners')
                            ->maxSize(4096)
                            ->columnSpanFull(),
                    ]),
                Section::make('Settings')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Toggle::make('featured')
                                    ->label('Featured Service'),
                                Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),
                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),
                            ]),
                    ]),
            ]);
    }
}
