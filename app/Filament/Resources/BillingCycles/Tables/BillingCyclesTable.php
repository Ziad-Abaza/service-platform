<?php

namespace App\Filament\Resources\BillingCycles\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BillingCyclesTable
{
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('tables.columns.id'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label(__('tables.columns.name'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label(__('tables.columns.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('tables.columns.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
            ]);
    }
}