<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ServiceComparison extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $appends = [
        'name',
        'description',
        'banner_url'
    ];

    /**
     * Translation: name
     */
    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"name_{$locale}"} ?? $this->name_en ?? $this->name_ar;
    }

    /**
     * Translation: description
     */
    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"description_{$locale}"} ?? $this->description_en ?? $this->description_ar;
    }

    /**
     * Accessor for banner/media URL
     */
    public function getBannerUrlAttribute()
    {
        $media = $this->getFirstMedia('banner');
        return $media ? $media->getUrl() : null;
    }

    /**
     * Relation to comparison services
     */
    public function comparisonServices()
    {
        return $this->hasMany(ComparisonService::class);
    }

    /**
     * Relation to services (through comparison services)
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'comparison_services')
            ->withPivot('sort_order')
            ->orderBy('pivot_sort_order');
    }

    /**
     * Scope active comparisons
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Add banner file
     */
    public function addBanner($file)
    {
        $this->clearMediaCollection('banner');
        $this->addMedia($file)->toMediaCollection('banner');
    }

    /**
     * Get services count in this comparison
     */
    public function getServicesCountAttribute()
    {
        return $this->comparisonServices()->count();
    }

    /**
     * Check if comparison has services
     */
    public function hasServices()
    {
        return $this->comparisonServices()->exists();
    }
}
