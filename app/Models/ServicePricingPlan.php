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
        'description_ar',
        'description_en',
        'price',
        'billing_period_ar',
        'billing_period_en',
        'billing_cycle_id',
        'badge_ar',
        'badge_en',
        'button_text_ar',
        'button_text_en',
        'button_link',
        'highlight_text_ar',
        'highlight_text_en',
        'second_button_text_ar',
        'second_button_text_en',
        'second_button_link',
        'popular',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'popular' => 'boolean',
        'is_featured' => 'boolean',
    ];

    protected $appends = [
        'name',
        'description',
        'billing_period',
        'badge',
        'button_text',
        'second_button_text',
        'highlight_text',
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
     * Translation: billing_period
     */
    public function getBillingPeriodAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"billing_period_{$locale}"} ?? $this->billing_period_en ?? $this->billing_period_ar;
    }

    /**
     * Translation: badge
     */
    public function getBadgeAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"badge_{$locale}"} ?? $this->badge_en ?? $this->badge_ar;
    }

    /**
     * Translation: button_text
     */
    public function getButtonTextAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"button_text_{$locale}"} ?? $this->button_text_en ?? $this->button_text_ar;
    }

    /**
     * Translation: second_button_text
     */
    public function getSecondButtonTextAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"second_button_text_{$locale}"} ?? $this->second_button_text_en ?? $this->second_button_text_ar;
    }

    /**
     * Translation: highlight_text
     */
    public function getHighlightTextAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"highlight_text_{$locale}"} ?? $this->highlight_text_en ?? $this->highlight_text_ar;
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
        return $this->hasMany(PricingPlanFeature::class, 'pricing_plan_id');
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

    /**
     * Scope featured plans
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * The features that belong to the pricing plan.
     */
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'pricing_plan_features', 'pricing_plan_id', 'feature_id')
            ->withTimestamps();
    }
}
