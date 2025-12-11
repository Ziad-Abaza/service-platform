<?php

namespace App\Filament\Resources\ServiceDocuments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class ServiceDocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make(__('filament.basic_information'))
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Select::make('service_id')
                                ->label(__('models.service'))
                                ->relationship('service', 'name_en')
                                ->searchable()
                                ->preload()
                                ->required(),
                            Select::make('document_type_id')
                                ->label(__('models.document_type'))
                                ->relationship('documentType', 'name_en')
                                ->searchable()
                                ->preload()
                                ->required(),
                        ]),
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
            Section::make(__('filament.media'))
                ->schema([
                    FileUpload::make('file')
                        ->label(__('models.file'))
                        ->directory('service-documents')
                        ->maxSize(10240)
                        ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                        ->columnSpanFull(),
                ]),
            Section::make(__('filament.settings'))
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Toggle::make('is_active')
                                ->label(__('common.active'))
                                ->default(true),
                            TextInput::make('sort_order')
                                ->label(__('models.sort_order'))
                                ->numeric()
                                ->default(0),
                        ]),
                ]),
        ]);
    }
}
