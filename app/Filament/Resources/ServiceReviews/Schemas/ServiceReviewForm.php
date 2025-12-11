<?php

namespace App\Filament\Resources\ServiceReviews\Schemas;

use App\Models\Service;
use App\Models\User;
use App\Models\ServiceReview;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Rating;
use Filament\Schemas\Schema;

class ServiceReviewForm
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
                    ->required()
                    ->placeholder(__('models.select_service'))
                    ->columnSpan(2),
                    
                Select::make('user_id')
                    ->label(__('models.user'))
                    ->options(User::query()
                        ->select('id', 'name', 'email')
                        ->get()
                        ->mapWithKeys(function ($user) {
                            return [$user->id => $user->name . ' (' . $user->email . ')'];
                        }))
                    ->searchable()
                    ->default(null)
                    ->placeholder(__('models.select_user'))
                    ->columnSpan(2),
                    
                Select::make('parent_id')
                    ->label(__('models.parent_review'))
                    ->options(ServiceReview::query()
                        ->select('id', 'name', 'comment')
                        ->get()
                        ->mapWithKeys(function ($review) {
                            return [$review->id => substr($review->name . ': ' . $review->comment, 0, 50) . '...'];
                        }))
                    ->searchable()
                    ->default(null)
                    ->columnSpan(2),
                    
                TextInput::make('name')
                    ->label(__('models.name'))
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),
                    
                TextInput::make('email')
                    ->label(__('models.email'))
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),
                    
                Select::make('rating')
                    ->label(__('models.rating'))
                    ->options([
                        1 => '1 ' . __('models.star'),
                        2 => '2 ' . __('models.stars'),
                        3 => '3 ' . __('models.stars'),
                        4 => '4 ' . __('models.stars'),
                        5 => '5 ' . __('models.stars'),
                    ])
                    ->required()
                    ->columnSpan(2),
                    
                Textarea::make('comment')
                    ->label(__('models.comment'))
                    ->required()
                    ->maxLength(65535)
                    ->columnSpan(2),
                    
                Textarea::make('comment')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('avatar_url')
                    ->url()
                    ->default(null),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                        'spam' => 'Spam',
                    ])
                    ->required()
                    ->default('pending')
                    ->columnSpan(2),
            ]);
    }
}
