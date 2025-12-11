<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make(__('filament.basic_information'))
                ->schema([
                    TextInput::make('key')
                        ->label(__('models.key'))
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),
                    Select::make('type')
                        ->label(__('models.type'))
                        ->options([
                            'text' => __('models.text'),
                            'textarea' => __('models.textarea'),
                            'number' => __('models.number'),
                            'boolean' => __('models.boolean'),
                            'json' => __('models.json'),
                        ])
                        ->required(),
                ]),
            Section::make(__('models.values'))
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Textarea::make('value_ar')
                                ->label(__('models.value_ar'))
                                ->rows(3),
                            Textarea::make('value_en')
                                ->label(__('models.value_en'))
                                ->rows(3),
                        ]),
                ]),
            Section::make(__('filament.description'))
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Textarea::make('description_ar')
                                ->label(__('models.description_ar'))
                                ->rows(2),
                            Textarea::make('description_en')
                                ->label(__('models.description_en'))
                                ->rows(2),
                        ]),
                ]),
        ]);
    }
}
