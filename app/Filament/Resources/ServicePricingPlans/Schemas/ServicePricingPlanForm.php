<?php

namespace App\Filament\Resources\ServicePricingPlans\Schemas;

use App\Models\Service;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
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

                Section::make('Content')
                    ->schema([
                        Textarea::make('description_ar')
                            ->label(__('models.description_ar'))
                            ->rows(3),
                        Textarea::make('description_en')
                            ->label(__('models.description_en'))
                            ->rows(3),
                        TextInput::make('highlight_text_ar')
                            ->label('Highlight Text (AR) (e.g. Best Value)'),
                        TextInput::make('highlight_text_en')
                            ->label('Highlight Text (EN)'),
                        TextInput::make('badge_ar')
                            ->label('Badge (AR) (e.g. POPULAR)'),
                        TextInput::make('badge_en')
                            ->label('Badge (EN)'),
                    ])->columns(2),

                Section::make('Billing Display')
                    ->schema([
                        TextInput::make('billing_period_ar')
                            ->label('Billing Period Text (AR) (e.g. /month)'),
                        TextInput::make('billing_period_en')
                            ->label('Billing Period Text (EN)'),
                    ])->columns(2),

                Section::make('Action Button')
                    ->schema([
                        TextInput::make('button_text_ar')
                            ->label('Button Text (AR)'),
                        TextInput::make('button_text_en')
                            ->label('Button Text (EN)'),
                        TextInput::make('button_link')
                            ->label('Button URL')
                            ->prefix('https://')
                            ->columnSpan(2),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('second_button_text_ar')
                                    ->label('Secondary Button Text (AR)'),
                                TextInput::make('second_button_text_en')
                                    ->label('Secondary Button Text (EN)'),
                                TextInput::make('second_button_link')
                                    ->label('Secondary Button URL')
                                    ->prefix('https://')
                                    ->columnSpan(2),
                            ]),
                    ])->columns(2),

                Toggle::make('popular')
                    ->label(__('models.popular')),
                Toggle::make('is_featured')
                    ->label('Is Featured (Highlighted)'),

                TextInput::make('sort_order')
                    ->label(__('models.sort_order'))
                    ->numeric()
                    ->default(0),
            ]);
    }
}
