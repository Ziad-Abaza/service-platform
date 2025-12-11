<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('filament.basic_information'))
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('category_id')
                                    ->label(__('models.service_category'))
                                    ->relationship('category', 'name_en')
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
                                Textarea::make('short_description_ar')
                                    ->label(__('models.description_ar'))
                                    ->rows(3),
                                Textarea::make('short_description_en')
                                    ->label(__('models.description_en'))
                                    ->rows(3),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Textarea::make('description_ar')
                                    ->label(__('models.description_ar'))
                                    ->rows(5),
                                Textarea::make('description_en')
                                    ->label(__('models.description_en'))
                                    ->rows(5),
                            ]),
                    ]),
                Section::make(__('filament.media'))
                    ->schema([
                        FileUpload::make('logo')
                            ->image()
                            ->disk('public')
                            ->directory('services/logos')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->columnSpanFull(),
                        FileUpload::make('banner')
                            ->image()
                            ->disk('public')
                            ->directory('services/banners')
                            ->visibility('public')
                            ->maxSize(4096)
                            ->columnSpanFull(),
                    ]),
                Section::make(__('filament.settings'))
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Toggle::make('featured')
                                    ->label(__('models.featured_service')),
                                Toggle::make('is_active')
                                    ->label(__('common.active'))
                                    ->default(true),
                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),
                            ]),
                    ]),
            ]);
    }
}
