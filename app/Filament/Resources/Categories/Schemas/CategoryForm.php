<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('parent_id')
                                    ->label('Parent Category')
                                    ->relationship('parent', 'name')
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
                                    ->label('Arabic Name')
                                    ->required(),
                                TextInput::make('name_en')
                                    ->label('English Name')
                                    ->required(),
                            ]),
                    ]),
                Section::make('Description')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Textarea::make('description_ar')
                                    ->label('Arabic Description')
                                    ->rows(4),
                                Textarea::make('description_en')
                                    ->label('English Description')
                                    ->rows(4),
                            ]),
                    ]),
                Section::make('Media')
                    ->schema([
                        FileUpload::make('logo')
                            ->image()
                            ->directory('categories/logos')
                            ->maxSize(2048)
                            ->columnSpanFull(),
                    ]),
                Section::make('SEO')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('meta_title_ar')
                                    ->label('Arabic Meta Title'),
                                TextInput::make('meta_title_en')
                                    ->label('English Meta Title'),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Textarea::make('meta_description_ar')
                                    ->label('Arabic Meta Description')
                                    ->rows(3),
                                Textarea::make('meta_description_en')
                                    ->label('English Meta Description')
                                    ->rows(3),
                            ]),
                    ]),
                Section::make('Settings')
                    ->schema([
                        Grid::make(2)
                            ->schema([
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
