<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'parent_id',
        'name_ar',
        'name_en',
        'slug',
        'description_ar',
        'description_en',
        'sort_order',
        'is_active',
        'meta_title_ar',
        'meta_title_en',
        'meta_description_ar',
        'meta_description_en',
    ];

    protected $appends = ['name', 'description', 'meta_title', 'meta_description', 'logo_url'];

    /**
     * Get all services for the category
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Boot method to auto-generate slug
     */
    protected static function booted()
    {
        static::creating(function ($category) {
            if (!$category->slug) {
                $category->slug = Str::slug($category->name_en ?? $category->name_ar);
            }
        });
        static::updating(function ($category) {
            if (!$category->slug) {
                $category->slug = Str::slug($category->name_en ?? $category->name_ar);
            }
        });
    }

    /**
     * Relation to parent category
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Relation to child categories
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
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
     * Translation: meta title
     */
    public function getMetaTitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"meta_title_{$locale}"} ?? null;
    }

    /**
     * Translation: meta description
     */
    public function getMetaDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"meta_description_{$locale}"} ?? null;
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
     * Scope active categories
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
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
     * Optional: set slug manually
     */
    public function setSlug($slug)
    {
        $this->slug = Str::slug($slug);
        $this->save();
    }
}
