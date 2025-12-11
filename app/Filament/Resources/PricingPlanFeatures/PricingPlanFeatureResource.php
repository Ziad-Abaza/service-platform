<?php

namespace App\Filament\Resources\PricingPlanFeatures;

use App\Filament\Resources\PricingPlanFeatures\Pages\CreatePricingPlanFeature;
use App\Filament\Resources\PricingPlanFeatures\Pages\EditPricingPlanFeature;
use App\Filament\Resources\PricingPlanFeatures\Pages\ListPricingPlanFeatures;
use App\Filament\Resources\PricingPlanFeatures\Schemas\PricingPlanFeatureForm;
use App\Filament\Resources\PricingPlanFeatures\Tables\PricingPlanFeaturesTable;
use App\Models\PricingPlanFeature;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PricingPlanFeatureResource extends Resource
{
    protected static ?string $model = PricingPlanFeature::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedListBullet;

    protected static string|UnitEnum|null $navigationGroup = 'Configuration';

    protected static ?int $navigationSort = 4;

    public static function getNavigationLabel(): string
    {
        return __('models.pricing_plan_features');
    }

    public static function getPluralModelLabel(): string
    {
        return __('models.pricing_plan_features');
    }

    public static function getModelLabel(): string
    {
        return __('models.pricing_plan_feature');
    }

    public static function form(Schema $schema): Schema
    {
        return PricingPlanFeatureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PricingPlanFeaturesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPricingPlanFeatures::route('/'),
            'create' => CreatePricingPlanFeature::route('/create'),
            'edit' => EditPricingPlanFeature::route('/{record}/edit'),
        ];
    }
}
