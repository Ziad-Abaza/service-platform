<?php

namespace Database\Factories;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeatureFactory extends Factory
{
    protected $model = Feature::class;

    public function definition()
    {
        return [
            'name_ar' => 'ميزة ' . $this->faker->word(),
            'name_en' => $this->faker->words(2, true),
            'description_ar' => 'وصف الميزة بالعربية',
            'description_en' => $this->faker->sentence(),
            'sort_order' => $this->faker->numberBetween(1, 100),
        ];
    }
}
