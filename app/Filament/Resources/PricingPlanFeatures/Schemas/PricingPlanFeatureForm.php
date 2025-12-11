<?php

namespace App\Filament\Resources\PricingPlanFeatures\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PricingPlanFeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make(__('filament.basic_information'))
                ->schema([
                    Select::make('pricing_plan_id')
                        ->label(__('models.pricing_plan'))
                        ->relationship('pricingPlan', 'name_en')
                        ->searchable()
                        ->preload()
                        ->required(),
                    Select::make('feature_id')
                        ->label(__('models.feature'))
                        ->relationship('feature', 'name_en')
                        ->searchable()
                        ->preload()
                        ->required(),
                ]),
        ]);
    }
}

