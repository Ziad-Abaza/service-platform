<?php

namespace App\Filament\Resources\ServiceWebinars\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class ServiceWebinarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make(__('filament.basic_information'))
                ->schema([
                    Select::make('service_id')
                        ->label(__('models.service'))
                        ->relationship('service', 'name_en')
                        ->searchable()
                        ->preload()
                        ->required(),
                    Grid::make(2)
                        ->schema([
                            TextInput::make('title_ar')
                                ->label(__('models.title_ar'))
                                ->required(),
                            TextInput::make('title_en')
                                ->label(__('models.title_en'))
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
            Section::make(__('models.webinar_details'))
                ->schema([
                    Grid::make(2)
                        ->schema([
                            DateTimePicker::make('schedule_date')
                                ->label(__('models.schedule_date'))
                                ->required(),
                            TextInput::make('duration')
                                ->label(__('models.duration'))
                                ->numeric()
                                ->suffix(__('models.minutes'))
                                ->helperText(__('models.duration_in_minutes')),
                        ]),
                    TextInput::make('registration_url')
                        ->label(__('models.registration_url'))
                        ->url()
                        ->columnSpanFull(),
                    Grid::make(2)
                        ->schema([
                            TextInput::make('max_attendees')
                                ->label(__('models.max_attendees'))
                                ->numeric()
                                ->helperText(__('models.leave_empty_unlimited')),
                            Toggle::make('is_recurring')
                                ->label(__('models.is_recurring'))
                                ->default(false),
                        ]),
                ]),
            Section::make(__('filament.media'))
                ->schema([
                    FileUpload::make('banner')
                        ->label(__('models.banner'))
                        ->image()
                        ->disk('public')
                        ->directory('webinar-banners')
                        ->visibility('public')
                        ->maxSize(2048)
                        ->columnSpanFull(),
                ]),
            Section::make(__('filament.settings'))
                ->schema([
                    Toggle::make('is_active')
                        ->label(__('common.active'))
                        ->default(true),
                ]),
        ]);
    }
}
