<?php

namespace App\Filament\Resources\PricingPlanFeatures\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class PricingPlanFeaturesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pricingPlan.name')
                    ->label(__('models.pricing_plan'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('feature.name')
                    ->label(__('models.feature'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('common.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('pricing_plan')
                    ->relationship('pricingPlan', 'name_en')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('feature')
                    ->relationship('feature', 'name_en')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                EditAction::make()
                    ->label('')
                    ->tooltip(__('common.edit')),
                DeleteAction::make()
                    ->label('')
                    ->tooltip(__('common.delete')),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

