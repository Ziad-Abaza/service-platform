<?php

namespace App\Filament\Resources\ServiceReviews\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServiceReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('service.name')
                    ->label(__('models.service'))
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('user.name')
                    ->label(__('models.user'))
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('name')
                    ->label(__('models.name'))
                    ->searchable(),
                    
                TextColumn::make('email')
                    ->label(__('models.email'))
                    ->searchable(),
                    
                TextColumn::make('rating')
                    ->label(__('models.rating'))
                    ->numeric()
                    ->sortable()
                    ->formatStateUsing(fn (string $state): string => "{$state}/5"),
                    
                TextColumn::make('status')
                    ->label(__('models.status'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => __("models.{$state}")),
                    
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
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
