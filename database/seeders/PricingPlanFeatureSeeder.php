<?php

namespace Database\Seeders;

use App\Models\ServicePricingPlan;
use App\Models\Feature;
use Illuminate\Database\Seeder;

class PricingPlanFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all pricing plans
        $pricingPlans = ServicePricingPlan::all();
        
        // Get all features
        $features = Feature::all();
        
        if ($pricingPlans->isEmpty() || $features->isEmpty()) {
            $this->command->warn('No pricing plans or features found. Please run the necessary seeders first.');
            return;
        }

        // For each pricing plan, attach a random number of features (1 to all features)
        foreach ($pricingPlans as $plan) {
            // Determine how many features to attach (at least 1, up to total features count)
            $featureCount = rand(1, $features->count());
            
            // Get random features
            $randomFeatures = $features->random($featureCount);
            
            // Attach features to the pricing plan
            foreach ($randomFeatures as $feature) {
                $plan->features()->attach($feature->id);
            }
            
            $this->command->info("Attached {$featureCount} features to pricing plan: {$plan->name_en}");
        }
    }
}
