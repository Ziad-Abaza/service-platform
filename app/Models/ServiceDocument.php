<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ServiceDocument extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'service_id',
        'document_type_id',
        'title_ar',
        'title_en',
        'content_ar',
        'content_en',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $appends = [
        'title',
        'content',
        'file_url'
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
     * Translation: content
     */
    public function getContentAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"content_{$locale}"} ?? $this->content_en ?? $this->content_ar;
    }

    /**
     * Accessor for file/media URL
     */
    public function getFileUrlAttribute()
    {
        $media = $this->getFirstMedia('document');
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
     * Relation to document type
     */
    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, 'document_type_id');
    }

    /**
     * Scope active documents
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope ordered by sort order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    /**
     * Add document file
     */
    public function addFile($file)
    {
        $this->clearMediaCollection('document');
        $this->addMedia($file)->toMediaCollection('document');
    }

    /**
     * Check if document has file attached
     */
    public function hasFile()
    {
        return !is_null($this->file_url);
    }

    /**
     * Get file size in human readable format
     */
    public function getFormattedFileSizeAttribute()
    {
        $media = $this->getFirstMedia('document');
        if (!$media) return null;
        
        $bytes = $media->size;
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    /**
     * Get file extension
     */
    public function getFileExtensionAttribute()
    {
        $media = $this->getFirstMedia('document');
        if (!$media) return null;
        
        return pathinfo($media->file_name, PATHINFO_EXTENSION);
    }
}
