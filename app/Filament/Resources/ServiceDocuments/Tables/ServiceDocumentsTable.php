<?php

namespace App\Filament\Resources\ServiceDocuments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class ServiceDocumentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('models.title'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('service.name')
                    ->label(__('models.service'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('documentType.name')
                    ->label(__('models.document_type'))
                    ->searchable()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label(__('filament.active'))
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->label(__('filament.order'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
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
                SelectFilter::make('document_type')
                    ->relationship('documentType', 'name_en')
                    ->searchable()
                    ->preload(),
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
