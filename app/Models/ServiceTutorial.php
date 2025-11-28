<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Services\VideoService;
use Illuminate\Support\Facades\Storage;

class ServiceTutorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'video', 
        'duration',    
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'duration' => 'integer',
        'is_active' => 'boolean',
    ];

    protected $appends = [
        'title',
        'description',
        'video_url',
        'video_thumbnail',
        'formatted_duration',
    ];

    /**
     * Translation: title
     */
    public function getTitleAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_en ?? $this->title_ar;
    }

    /**
     * Translation: description
     */
    public function getDescriptionAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"description_{$locale}"} ?? $this->description_en ?? $this->description_ar;
    }

    /**
     * Relation to service
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Video URL accessor
     */
    public function getVideoUrlAttribute(): ?string
    {
        if (empty($this->video)) return null;

        if (is_array($this->video) && isset($this->video['path'])) {
            return Storage::url($this->video['path']);
        }

        return $this->video ? Storage::url($this->video) : null;
    }

    /**
     * Video thumbnail accessor
     */
    public function getVideoThumbnailAttribute(): ?string
    {
        if (empty($this->video)) return null;

        if (is_array($this->video) && isset($this->video['thumbnail'])) {
            return Storage::url($this->video['thumbnail']);
        }

        return null;
    }

    /**
     * Human-readable duration (MM:SS)
     */
    public function getFormattedDurationAttribute(): string
    {
        $minutes = floor($this->duration / 60);
        $seconds = $this->duration % 60;
        return sprintf('%02d:%02d', $minutes, $seconds);
    }

    /**
     * Upload video via VideoService
     */
    public function uploadVideo($file): self
    {
        $videoService = app(VideoService::class);
        $videoData = $videoService->upload($file, 'service_tutorials');

        $this->video = [
            'path' => $videoData['path'],
            'thumbnail' => $videoData['thumbnail'] ?? null,
            'duration' => $videoData['duration'] ?? null,
            'original_name' => $videoData['original_name'] ?? null,
        ];

        $this->duration = $videoData['duration'] ?? $this->duration;
        $this->save();

        return $this;
    }

    /**
     * Delete associated video
     */
    public function deleteVideo(): bool
    {
        if (!empty($this->video)) {
            $videoService = app(VideoService::class);

            if (is_array($this->video) && isset($this->video['path'])) {
                return $videoService->delete($this->video['path']);
            }

            return $videoService->delete($this->video);
        }

        return false;
    }

    /**
     * Scope active tutorials
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope ordered by sort_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
