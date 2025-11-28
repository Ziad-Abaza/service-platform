<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
    ];

    protected $appends = [
        'name'
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
     * Relation to documents
     */
    public function documents()
    {
        return $this->hasMany(ServiceDocument::class, 'document_type_id');
    }
}
