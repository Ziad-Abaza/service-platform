<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebinarRecurringPattern extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'days_of_week',
        'day_of_month',
    ];

    protected $casts = [
        'days_of_week' => 'array',
    ];

    /**
     * Get the webinars that use this pattern.
     */
    public function webinars()
    {
        return $this->hasMany(ServiceWebinar::class, 'recurring_pattern_id');
    }
}
