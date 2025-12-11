<?php

namespace App\Filament\Resources\BillingCycles;

use App\Filament\Resources\BillingCycles\Pages\CreateBillingCycle;
use App\Filament\Resources\BillingCycles\Pages\EditBillingCycle;
use App\Filament\Resources\BillingCycles\Pages\ListBillingCycles;
use App\Filament\Resources\BillingCycles\Schemas\BillingCycleForm;
use App\Models\BillingCycle;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use UnitEnum;

class BillingCycleResource extends Resource
{
    protected static ?string $model = BillingCycle::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClock;

    protected static ?string $modelLabel = 'billing_cycle';
    protected static ?string $pluralModelLabel = 'billing_cycles';
    protected static ?string $navigationLabel = 'billing_cycles';
    protected static ?string $breadcrumb = 'billing_cycles';
    protected static ?string $recordTitleAttribute = 'name';

    protected static string|UnitEnum|null $navigationGroup = 'Settings';

    public static function getNavigationLabel(): string
    {
        return __('models.billing_cycles');
    }

    public static function getBreadcrumb(): string
    {
        return __('models.billing_cycles');
    }

    public static function getCreateButtonLabel(): string
    {
        return __('models.create_billing_cycle');
    }

    public static function getPluralModelLabel(): string
    {
        return __('models.billing_cycles');
    }

    public static function form(Schema $schema): Schema
    {
        return BillingCycleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('tables.columns.id'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label(__('models.name'))
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
                EditAction::make()
                    ->label('')
                    ->tooltip(__('filament-actions::edit.single.label', ['label' => ''])),
                DeleteAction::make()
                    ->label('')
                    ->tooltip(__('filament-actions::delete.single.label', ['label' => ''])),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBillingCycles::route('/'),
            'create' => CreateBillingCycle::route('/create'),
            'edit' => EditBillingCycle::route('/{record}/edit'),
        ];
    }
}
