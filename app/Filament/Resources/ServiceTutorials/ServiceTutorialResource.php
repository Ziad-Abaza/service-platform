<?php

namespace App\Filament\Resources\ServiceTutorials;

use App\Filament\Resources\ServiceTutorials\Pages\CreateServiceTutorial;
use App\Filament\Resources\ServiceTutorials\Pages\EditServiceTutorial;
use App\Filament\Resources\ServiceTutorials\Pages\ListServiceTutorials;
use App\Filament\Resources\ServiceTutorials\Schemas\ServiceTutorialForm;
use App\Filament\Resources\ServiceTutorials\Tables\ServiceTutorialsTable;
use App\Models\ServiceTutorial;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ServiceTutorialResource extends Resource
{
    protected static ?string $model = ServiceTutorial::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    protected static ?string $recordTitleAttribute = 'title';

    protected static string|UnitEnum|null $navigationGroup = 'Content Management';

    public static function getNavigationLabel(): string
    {
        return __('models.service_tutorials');
    }

    public static function getPluralModelLabel(): string
    {
        return __('models.service_tutorials');
    }

    public static function getModelLabel(): string
    {
        return __('models.service_tutorial');
    }

    public static function form(Schema $schema): Schema
    {
        return ServiceTutorialForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceTutorialsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServiceTutorials::route('/'),
            'create' => CreateServiceTutorial::route('/create'),
            'edit' => EditServiceTutorial::route('/{record}/edit'),
        ];
    }
}
