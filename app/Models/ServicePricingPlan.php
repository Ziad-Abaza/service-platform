<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServicePricingPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'name_ar',
        'name_en',
        'price',
        'billing_cycle_id',
        'popular',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'popular' => 'boolean',
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
     * Relation to service
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Relation to billing cycle
     */
    public function billingCycle()
    {
        return $this->belongsTo(BillingCycle::class, 'billing_cycle_id');
    }

    /**
     * Relation to pricing plan features
     */
    public function pricingPlanFeatures()
    {
        return $this->hasMany(PricingPlanFeature::class);
    }

    /**
     * Scope popular plans
     */
    public function scopePopular($query)
    {
        return $query->where('popular', true);
    }

    /**
     * Scope ordered by sort order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
