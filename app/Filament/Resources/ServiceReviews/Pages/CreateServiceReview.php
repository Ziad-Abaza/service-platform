<?php

namespace App\Filament\Resources\ServiceReviews\Pages;

use App\Filament\Resources\ServiceReviews\ServiceReviewResource;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceReview extends CreateRecord
{
    protected static string $resource = ServiceReviewResource::class;

    public function getTitle(): string 
    {
        return __('models.create_service_review');
    }

    public function getBreadcrumbs(): array
    {
        return [
            route('filament.admin.pages.dashboard') => __('navigation.dashboard'),
            ServiceReviewResource::getUrl() => __('models.service_reviews'),
            $this->getTitle(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return __('models.service_review_created');
    }
}
