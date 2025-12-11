<?php

namespace App\Filament\Resources\ServiceComparisons\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceComparisonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Section::make()
                            ->columnSpan(2)
                            ->schema([
                                Tabs::make('Label')
                                    ->tabs([
                                        Tabs\Tab::make('English')
                                            ->schema([
                                                TextInput::make('name_en')
                                                    ->label('Name (English)')
                                                    ->required()
                                                    ->maxLength(255),
                                                Textarea::make('description_en')
                                                    ->label('Description (English)')
                                                    ->rows(3),
                                            ]),
                                        Tabs\Tab::make('Arabic')
                                            ->schema([
                                                TextInput::make('name_ar')
                                                    ->label('Name (Arabic)')
                                                    ->required()
                                                    ->maxLength(255),
                                                Textarea::make('description_ar')
                                                    ->label('Description (Arabic)')
                                                    ->rows(3),
                                            ]),
                                    ]),

                                Select::make('services')
                                    ->relationship('services', 'name_en') // Assuming name_en or using virtual attribute if searchable
                                    ->multiple()
                                    ->preload()
                                    ->searchable()
                                    ->label('Services to Compare')
                                    ->helperText('Select services to include in this comparison table.'),
                            ]),
                        Section::make()
                            ->columnSpan(1)
                            ->schema([
                                FileUpload::make('banner')
                                    ->label('Banner Image')
                                    ->image()
                                    ->directory('service-comparisons'),

                                Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),
                            ]),
                    ]),
            ]);
    }
}
