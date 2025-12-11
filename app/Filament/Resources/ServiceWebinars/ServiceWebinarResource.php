<?php

namespace App\Filament\Resources\ServiceWebinars;

use App\Filament\Resources\ServiceWebinars\Pages\CreateServiceWebinar;
use App\Filament\Resources\ServiceWebinars\Pages\EditServiceWebinar;
use App\Filament\Resources\ServiceWebinars\Pages\ListServiceWebinars;
use App\Filament\Resources\ServiceWebinars\Schemas\ServiceWebinarForm;
use App\Filament\Resources\ServiceWebinars\Tables\ServiceWebinarsTable;
use App\Models\ServiceWebinar;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ServiceWebinarResource extends Resource
{
    protected static ?string $model = ServiceWebinar::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedVideoCamera;

    protected static ?string $recordTitleAttribute = 'title';

    protected static string|UnitEnum|null $navigationGroup = 'Service Content';

    protected static ?int $navigationSort = 3;

    public static function getNavigationLabel(): string
    {
        return __('models.service_webinars');
    }

    public static function getPluralModelLabel(): string
    {
        return __('models.service_webinars');
    }

    public static function getModelLabel(): string
    {
        return __('models.service_webinar');
    }

    public static function form(Schema $schema): Schema
    {
        return ServiceWebinarForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceWebinarsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServiceWebinars::route('/'),
            'create' => CreateServiceWebinar::route('/create'),
            'edit' => EditServiceWebinar::route('/{record}/edit'),
        ];
    }
}
