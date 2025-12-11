<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('filament.basic_information'))
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('parent_id')
                                    ->label(__('models.parent_category'))
                                    ->relationship('parent', 'name_en')
                                    ->searchable()
                                    ->preload()
                                    ->default(null),
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
                            ->image()
                            ->disk('public')
                            ->directory('categories/logos')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->columnSpanFull(),
                    ]),
                Section::make(__('filament.seo'))
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('meta_title_ar')
                                    ->label(__('models.meta_title_ar')),
                                TextInput::make('meta_title_en')
                                    ->label(__('models.meta_title_en')),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Textarea::make('meta_description_ar')
                                    ->label(__('models.meta_description_ar'))
                                    ->rows(3),
                                Textarea::make('meta_description_en')
                                    ->label(__('models.meta_description_en'))
                                    ->rows(3),
                            ]),
                    ]),
                Section::make(__('filament.settings'))
                    ->schema([
                        Grid::make(2)
                            ->schema([
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
