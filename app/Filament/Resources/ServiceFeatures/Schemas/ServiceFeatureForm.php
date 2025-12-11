<?php

namespace App\Filament\Resources\ServiceFeatures\Schemas;

use App\Models\Feature;
use App\Models\Service;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ServiceFeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('service_id')
                    ->label(__('models.service'))
                    ->options(Service::query()
                        ->select('id', 'name_ar', 'name_en')
                        ->get()
                        ->mapWithKeys(function ($service) {
                            return [$service->id => $service->name];
                        }))
                    ->searchable()
                    ->required()
                    ->placeholder(__('models.select_service')),
                    
                Select::make('feature_id')
                    ->label(__('models.feature'))
                    ->options(Feature::query()
                        ->select('id', 'name_ar', 'name_en')
                        ->get()
                        ->mapWithKeys(function ($feature) {
                            return [$feature->id => $feature->name];
                        }))
                    ->searchable()
                    ->required()
                    ->placeholder(__('models.select_feature')),
            ]);
    }
}
