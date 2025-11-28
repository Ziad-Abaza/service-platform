<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'feature_id',
    ];

    /**
     * Relation to service
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Relation to feature
     */
    public function feature()
    {
        return $this->belongsTo(Feature::class, 'feature_id');
    }
}
