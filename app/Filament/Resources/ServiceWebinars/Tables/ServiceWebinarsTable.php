<?php

namespace App\Filament\Resources\ServiceWebinars\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class ServiceWebinarsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('banner')
                    ->label(__('models.banner'))
                    ->size(40)
                    ->circular()
                    ->defaultImageUrl(url('placeholder.png')),
                TextColumn::make('title')
                    ->label(__('models.title'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('service.name')
                    ->label(__('models.service'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('schedule_date')
                    ->label(__('models.schedule_date'))
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('duration')
                    ->label(__('models.duration'))
                    ->formatStateUsing(fn($state) => $state ? $state . ' ' . __('models.minutes') : '-')
                    ->sortable(),
                IconColumn::make('is_recurring')
                    ->label(__('models.is_recurring'))
                    ->boolean()
                    ->toggleable(),
                IconColumn::make('is_active')
                    ->label(__('filament.active'))
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label(__('common.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('service')
                    ->relationship('service', 'name_en')
                    ->searchable()
                    ->preload(),
                TernaryFilter::make('is_recurring')
                    ->label(__('models.is_recurring')),
                TernaryFilter::make('is_active')
                    ->label(__('common.active')),
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
