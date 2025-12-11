<?php

namespace App\Filament\Resources\ServiceComparisons;

use App\Filament\Resources\ServiceComparisons\Pages\CreateServiceComparison;
use App\Filament\Resources\ServiceComparisons\Pages\EditServiceComparison;
use App\Filament\Resources\ServiceComparisons\Pages\ListServiceComparisons;
use App\Filament\Resources\ServiceComparisons\Schemas\ServiceComparisonForm;
use App\Filament\Resources\ServiceComparisons\Tables\ServiceComparisonsTable;
use App\Models\ServiceComparison;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class ServiceComparisonResource extends Resource
{
    protected static ?string $model = ServiceComparison::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-arrows-right-left';

    protected static ?string $recordTitleAttribute = 'name_en'; // Or just name if handled by accessor

    protected static string|UnitEnum|null $navigationGroup = 'Service Content';

    protected static ?int $navigationSort = 4; // Adjust sort order as needed

    public static function getLabel(): ?string
    {
        return __('navigation.comparison');
    }

    public static function getPluralLabel(): ?string
    {
        return __('navigation.comparisons');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('navigation.service_content');
    }

    public static function form(Schema $schema): Schema
    {
        return ServiceComparisonForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceComparisonsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServiceComparisons::route('/'),
            'create' => CreateServiceComparison::route('/create'),
            'edit' => EditServiceComparison::route('/{record}/edit'),
        ];
    }
}
