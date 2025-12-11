<?php

namespace App\Filament\Resources\ServiceDocuments;

use App\Filament\Resources\ServiceDocuments\Pages\CreateServiceDocument;
use App\Filament\Resources\ServiceDocuments\Pages\EditServiceDocument;
use App\Filament\Resources\ServiceDocuments\Pages\ListServiceDocuments;
use App\Filament\Resources\ServiceDocuments\Schemas\ServiceDocumentForm;
use App\Filament\Resources\ServiceDocuments\Tables\ServiceDocumentsTable;
use App\Models\ServiceDocument;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ServiceDocumentResource extends Resource
{
    protected static ?string $model = ServiceDocument::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $recordTitleAttribute = 'title';

    protected static string|UnitEnum|null $navigationGroup = 'Content Management';

    public static function getNavigationLabel(): string
    {
        return __('models.service_documents');
    }

    public static function getPluralModelLabel(): string
    {
        return __('models.service_documents');
    }

    public static function getModelLabel(): string
    {
        return __('models.service_document');
    }

    public static function form(Schema $schema): Schema
    {
        return ServiceDocumentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceDocumentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServiceDocuments::route('/'),
            'create' => CreateServiceDocument::route('/create'),
            'edit' => EditServiceDocument::route('/{record}/edit'),
        ];
    }
}
