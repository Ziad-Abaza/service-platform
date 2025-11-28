<?php

namespace App\Filament\Resources\ServicePricingPlans;

use App\Filament\Resources\ServicePricingPlans\Pages\CreateServicePricingPlan;
use App\Filament\Resources\ServicePricingPlans\Pages\EditServicePricingPlan;
use App\Filament\Resources\ServicePricingPlans\Pages\ListServicePricingPlans;
use App\Filament\Resources\ServicePricingPlans\Schemas\ServicePricingPlanForm;
use App\Filament\Resources\ServicePricingPlans\Tables\ServicePricingPlansTable;
use App\Models\ServicePricingPlan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServicePricingPlanResource extends Resource
{
    protected static ?string $model = ServicePricingPlan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ServicePricingPlanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServicePricingPlansTable::configure($table);
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
            'index' => ListServicePricingPlans::route('/'),
            'create' => CreateServicePricingPlan::route('/create'),
            'edit' => EditServicePricingPlan::route('/{record}/edit'),
        ];
    }
}
