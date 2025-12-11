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

                                \Filament\Forms\Components\Repeater::make('comparisonServices')
                                    ->relationship('comparisonServices') // Use the HasMany relationship
                                    ->schema([
                                        Select::make('service_id')
                                            ->relationship('service', 'name_en') // BelongsTo inside ComparisonService
                                            ->required()
                                            ->label('Service')
                                            ->searchable()
                                            ->preload()
                                            ->distinct()
                                            ->disableOptionsWhenSelectedInSiblingRepeaterItems(), // Prevent selecting same service twice

                                        \Filament\Forms\Components\KeyValue::make('comparison_data')
                                            ->label('Comparison Data')
                                            ->keyLabel('Feature')
                                            ->valueLabel('Value')
                                            ->helperText('Add features and their values (e.g., Price: $500, Support: 24/7, Mobile App: true/false)')
                                            ->columnSpanFull(),
                                    ])
                                    ->label('Services to Compare')
                                    ->itemLabel(fn(array $state): ?string => \App\Models\Service::find($state['service_id'] ?? null)?->name_en ?? null)
                                    ->collapsible()
                                    ->collapsed(),
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
