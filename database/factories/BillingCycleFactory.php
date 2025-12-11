<?php

namespace Database\Factories;

use App\Models\BillingCycle;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillingCycleFactory extends Factory
{
    protected $model = BillingCycle::class;

    public function definition()
    {
        $name = $this->faker->randomElement(['شهري', 'ربع سنوي', 'نصف سنوي', 'سنوي']);
        $nameEn = $this->faker->randomElement(['Monthly', 'Quarterly', 'Semi-Annually', 'Annually']);
        
        return [
            'name_ar' => $name,
            'name_en' => $nameEn,
            'description_ar' => 'فترة الفوترة: ' . $name,
            'description_en' => 'Billing period: ' . $nameEn,
            'months' => $this->faker->randomElement([1, 3, 6, 12]),
            'sort_order' => $this->faker->numberBetween(1, 10),
        ];
    }
}
