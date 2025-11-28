<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PricingPlanFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'pricing_plan_id',
        'feature_id',
    ];

    /**
     * Relation to pricing plan
     */
    public function pricingPlan()
    {
        return $this->belongsTo(ServicePricingPlan::class, 'pricing_plan_id');
    }

    /**
     * Relation to feature
     */
    public function feature()
    {
        return $this->belongsTo(Feature::class, 'feature_id');
    }
}
