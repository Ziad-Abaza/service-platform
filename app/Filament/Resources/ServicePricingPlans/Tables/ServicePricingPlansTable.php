<?php

namespace App\Filament\Resources\ServicePricingPlans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServicePricingPlansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('service.name')
                    ->label(__('models.service'))
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('name')
                    ->label(__('models.name'))
                    ->searchable()
                    ->formatStateUsing(fn (\App\Models\ServicePricingPlan $record) => $record->name),
                    
                TextColumn::make('price')
                    ->label(__('models.price'))
                    ->money()
                    ->sortable(),
                    
                TextColumn::make('billingCycle.name')
                    ->label(__('models.billing_cycle'))
                    ->sortable(),
                    
                IconColumn::make('popular')
                    ->label(__('models.popular'))
                    ->boolean(),
                    
                TextColumn::make('sort_order')
                    ->label(__('models.sort_order'))
                    ->numeric()
                    ->sortable(),
                    
                TextColumn::make('created_at')
                    ->label(__('models.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                TextColumn::make('updated_at')
                    ->label(__('models.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->emptyStateHeading(__('models.no_service_pricing_plans'))
            ->emptyStateDescription(fn () => __('models.create_service_pricing_plan'))
            ->emptyStateIcon('heroicon-o-rectangle-stack')
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
