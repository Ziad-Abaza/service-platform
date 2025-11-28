<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ServiceWebinar extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'service_id',
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'schedule_date',
        'duration',
        'registration_url',
        'is_recurring',
        'recurring_pattern_id',
        'max_attendees',
        'is_active',
    ];

    protected $casts = [
        'schedule_date' => 'datetime',
        'duration' => 'integer',
        'is_recurring' => 'boolean',
        'is_active' => 'boolean',
        'max_attendees' => 'integer',
    ];

    protected $appends = [
        'title',
        'description',
        'banner_url'
    ];

    /**
     * Translation: title
     */
    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_en ?? $this->title_ar;
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
     * Relation to service
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Relation to recurring pattern
     */
    public function recurringPattern()
    {
        return $this->belongsTo(WebinarRecurringPattern::class, 'recurring_pattern_id');
    }

    /**
     * Relation to webinar attendees (if exists)
     */
    public function attendees()
    {
        return $this->hasMany(WebinarAttendee::class);
    }

    /**
     * Scope active webinars
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope upcoming webinars
     */
    public function scopeUpcoming($query)
    {
        return $query->where('schedule_date', '>=', now());
    }

    /**
     * Scope past webinars
     */
    public function scopePast($query)
    {
        return $query->where('schedule_date', '<', now());
    }

    /**
     * Scope recurring webinars
     */
    public function scopeRecurring($query)
    {
        return $query->where('is_recurring', true);
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
     * Check if webinar is upcoming
     */
    public function isUpcoming()
    {
        return $this->schedule_date >= now();
    }

    /**
     * Check if webinar is past
     */
    public function isPast()
    {
        return $this->schedule_date < now();
    }

    /**
     * Check if webinar has registration limit
     */
    public function hasRegistrationLimit()
    {
        return !is_null($this->max_attendees);
    }

    /**
     * Format duration as human readable (e.g., "2 hours 30 minutes")
     */
    public function getFormattedDurationAttribute()
    {
        $hours = floor($this->duration / 60);
        $minutes = $this->duration % 60;
        
        if ($hours > 0) {
            return $hours == 1 
                ? "1 hour" . ($minutes > 0 ? " {$minutes} minutes" : "")
                : "{$hours} hours" . ($minutes > 0 ? " {$minutes} minutes" : "");
        }
        
        return "{$minutes} minutes";
    }
}
