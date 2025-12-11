<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label(__('filament.logo'))
                    ->size(40)
                    ->circular()
                    ->defaultImageUrl(url('placeholder.png')),
                TextColumn::make('name')
                    ->label(__('filament.category_name'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('parent.name')
                    ->label(__('filament.parent_category'))
                    ->searchable()
                    ->sortable()
                    ->placeholder(__('filament.root')),
                TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('services_count')
                    ->label(__('filament.services_count'))
                    ->counts('services')
                    ->sortable(),
                TextColumn::make('sort_order')
                    ->label(__('filament.order'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                IconColumn::make('is_active')
                    ->label(__('filament.active'))
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label(__('common.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('common.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('parent')
                    ->relationship('parent', 'name_en', fn($query) => $query->with(['parent']))
                    ->getOptionLabelFromRecordUsing(fn($record) => $record->name)
                    ->searchable()
                    ->preload()
                    ->placeholder(__('filament.all_categories')),
                TernaryFilter::make('is_active')
                    ->label(__('common.active')),
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
