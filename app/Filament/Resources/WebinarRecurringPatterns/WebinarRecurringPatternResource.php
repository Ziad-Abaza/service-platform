<?php

namespace App\Filament\Resources\WebinarRecurringPatterns;

use App\Filament\Resources\WebinarRecurringPatterns\Pages\CreateWebinarRecurringPattern;
use App\Filament\Resources\WebinarRecurringPatterns\Pages\EditWebinarRecurringPattern;
use App\Filament\Resources\WebinarRecurringPatterns\Pages\ListWebinarRecurringPatterns;
use App\Filament\Resources\WebinarRecurringPatterns\Pages\ViewWebinarRecurringPattern;
use App\Filament\Resources\WebinarRecurringPatterns\Schemas\WebinarRecurringPatternForm;
use App\Filament\Resources\WebinarRecurringPatterns\Schemas\WebinarRecurringPatternInfolist;
use App\Filament\Resources\WebinarRecurringPatterns\Tables\WebinarRecurringPatternsTable;
use App\Models\WebinarRecurringPattern;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WebinarRecurringPatternResource extends Resource
{
    protected static ?string $model = WebinarRecurringPattern::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $recordTitleAttribute = 'type';

    protected static ?int $navigationSort = 6;

    public static function getLabel(): ?string
    {
        return __('navigation.webinar_pattern');
    }

    public static function getPluralLabel(): ?string
    {
        return __('navigation.webinar_patterns');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('navigation.service_content');
    }

    public static function form(Schema $schema): Schema
    {
        return WebinarRecurringPatternForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return WebinarRecurringPatternInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WebinarRecurringPatternsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWebinarRecurringPatterns::route('/'),
            'create' => CreateWebinarRecurringPattern::route('/create'),
            'view' => ViewWebinarRecurringPattern::route('/{record}'),
            'edit' => EditWebinarRecurringPattern::route('/{record}/edit'),
        ];
    }
}
