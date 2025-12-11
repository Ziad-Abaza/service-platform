<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Feature extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'sort_order',
    ];

    protected $appends = [
        'name',
        'description',
        'logo_url'
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
     * Accessor for logo/media URL
     */
    public function getLogoUrlAttribute()
    {
        $media = $this->getFirstMedia('logo');
        return $media ? $media->getUrl() : null;
    }

    /**
     * Scope ordered by sort order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    /**
     * The services that have this feature.
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_features')
                    ->withTimestamps();
    }
    
    /**
     * The pricing plans that have this feature.
     */
    public function pricingPlans()
    {
        return $this->belongsToMany(ServicePricingPlan::class, 'pricing_plan_features', 'feature_id', 'pricing_plan_id')
                    ->withTimestamps();
    }

    /**
     * Add logo file
     */
    public function addLogo($file)
    {
        $this->clearMediaCollection('logo');
        $this->addMedia($file)->toMediaCollection('logo');
    }
}