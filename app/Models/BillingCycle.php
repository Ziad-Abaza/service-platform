<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillingCycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Relation to pricing plans
     */
    public function pricingPlans()
    {
        return $this->hasMany(ServicePricingPlan::class, 'billing_cycle_id');
    }
}
