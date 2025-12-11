<?php

namespace App\Filament\Resources\ServicePricingPlans\Schemas;

use App\Models\Service;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServicePricingPlanForm
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
                    ->placeholder(__('models.select_service'))
                    ->columnSpan(2),
                
                TextInput::make('name_ar')
                    ->label(__('models.name_ar'))
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('name_en')
                    ->label(__('models.name_en'))
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('price')
                    ->label(__('models.price'))
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                    
                Select::make('billing_cycle_id')
                    ->label(__('models.billing_cycle'))
                    ->options([
                        1 => __('models.monthly'),
                        2 => __('models.quarterly'),
                        3 => __('models.semi_annually'),
                        4 => __('models.annually'),
                    ])
                    ->required()
                    ->placeholder(__('models.select_billing_cycle')),
                    
                Toggle::make('popular')
                    ->label(__('models.popular')),
                    
                TextInput::make('sort_order')
                    ->label(__('models.sort_order'))
                    ->numeric()
                    ->default(0),
            ]);
    }
}
