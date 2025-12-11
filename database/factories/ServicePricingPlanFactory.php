<?php

namespace Database\Factories;

use App\Models\BillingCycle;
use App\Models\Service;
use App\Models\ServicePricingPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicePricingPlanFactory extends Factory
{
    protected $model = ServicePricingPlan::class;

    public function definition()
    {
        $billingCycle = BillingCycle::inRandomOrder()->first() ?? BillingCycle::factory()->create();
        $isPopular = $this->faker->boolean(20); // 20% chance of being popular
        $isFeatured = $this->faker->boolean(30); // 30% chance of being featured
        
        return [
            'service_id' => Service::factory(),
            'name_ar' => 'حزمة ' . $this->faker->word(),
            'name_en' => $this->faker->words(2, true) . ' Plan',
            'description_ar' => 'وصف الحزمة ' . $this->faker->sentence(5),
            'description_en' => $this->faker->sentence(5) . ' package description',
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'billing_cycle_id' => $billingCycle->id,
            'billing_period_ar' => $this->faker->randomElement(['شهرياً', 'سنوياً', 'ربع سنوي']),
            'billing_period_en' => $this->faker->randomElement(['Monthly', 'Yearly', 'Quarterly']),
            'badge_ar' => $isPopular ? 'الأكثر طلباً' : null,
            'badge_en' => $isPopular ? 'Most Popular' : null,
            'button_text_ar' => 'اشترك الآن',
            'button_text_en' => 'Subscribe Now',
            'second_button_text_ar' => 'تواصل معنا',
            'second_button_text_en' => 'Contact Us',
            'button_link' => '#pricing',
            'second_button_link' => '#contact',
            'highlight_text_ar' => $this->faker->optional(0.7)->sentence(), // 70% chance of having highlight text
            'highlight_text_en' => $this->faker->optional(0.7)->sentence(),
            'popular' => $isPopular,
            'is_featured' => $isFeatured,
            'sort_order' => $this->faker->numberBetween(1, 10),
        ];
    }

    public function popular()
    {
        return $this->state(function (array $attributes) {
            return array_merge($attributes, [
                'popular' => true,
                'badge_ar' => 'الأكثر طلباً',
                'badge_en' => 'Most Popular',
            ]);
        });
    }

    public function featured()
    {
        return $this->state(function (array $attributes) {
            return array_merge($attributes, [
                'is_featured' => true,
            ]);
        });
    }

    public function withButtons()
    {
        return $this->state(function (array $attributes) {
            return array_merge($attributes, [
                'button_text_ar' => 'اشترك الآن',
                'button_text_en' => 'Subscribe Now',
                'button_link' => '#pricing',
                'second_button_text_ar' => 'تواصل معنا',
                'second_button_text_en' => 'Contact Us',
                'second_button_link' => '#contact',
            ]);
        });
    }
}