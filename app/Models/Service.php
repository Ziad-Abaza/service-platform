<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Service extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'category_id',
        'name_ar',
        'name_en',
        'slug',
        'description_ar',
        'description_en',
        'short_description_ar',
        'short_description_en',
        'featured',
        'is_active',
        'sort_order',
    ];

    protected $appends = [
        'name',
        'description',
        'short_description',
        'logo_url',
        'banner_url'
    ];

    /**
     * Boot method to auto-generate slug
     */
    protected static function booted()
    {
        static::creating(function ($service) {
            if (!$service->slug) {
                $service->slug = Str::slug($service->name_en ?? $service->name_ar);
            }
        });

        static::updating(function ($service) {
            if (!$service->slug) {
                $service->slug = Str::slug($service->name_en ?? $service->name_ar);
            }
        });
    }

    /**
     * Relation to category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Relation to features
     */
    public function features()
    {
        return $this->hasMany(ServiceFeature::class);
    }

    /**
     * Relation to pricing plans
     */
    public function pricingPlans()
    {
        return $this->hasMany(ServicePricingPlan::class);
    }

    /**
     * Relation to reviews
     */
    public function reviews()
    {
        return $this->hasMany(ServiceReview::class);
    }

    /**
     * Relation to tutorials
     */
    public function tutorials()
    {
        return $this->hasMany(ServiceTutorial::class);
    }

    /**
     * Relation to webinars
     */
    public function webinars()
    {
        return $this->hasMany(ServiceWebinar::class);
    }

    /**
     * Relation to documents
     */
    public function documents()
    {
        return $this->hasMany(ServiceDocument::class);
    }

    /**
     * Relation to user favorites
     */
    public function favorites()
    {
        return $this->hasMany(UserServiceFavorite::class);
    }

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
     * Translation: short description
     */
    public function getShortDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"short_description_{$locale}"} ?? $this->short_description_en ?? $this->short_description_ar;
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
     * Accessor for banner/media URL
     */
    public function getBannerUrlAttribute()
    {
        $media = $this->getFirstMedia('banner');
        return $media ? $media->getUrl() : null;
    }

    /**
     * Scope active services
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope featured services
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope ordered by sort order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    /**
     * Add logo file
     */
    public function addLogo($file)
    {
        $this->clearMediaCollection('logo');
        $this->addMedia($file)->toMediaCollection('logo');
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
     * Set slug manually
     */
    public function setSlug($slug)
    {
        $this->slug = Str::slug($slug);
        $this->save();
    }
}
