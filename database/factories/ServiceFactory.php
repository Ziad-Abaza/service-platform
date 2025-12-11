<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition()
    {
        $name = $this->faker->unique()->words(3, true);
        
        return [
            'category_id' => Category::factory(),
            'name_ar' => 'خدمة ' . $this->faker->word(),
            'name_en' => $name,
            'description_ar' => 'وصف الخدمة بالعربية',
            'description_en' => $this->faker->paragraph(5),
            'short_description_ar' => 'وصف قصير بالعربية',
            'short_description_en' => $this->faker->sentence(),
            'featured' => $this->faker->boolean(30), // 30% chance of being featured
            'is_active' => $this->faker->boolean(90), // 90% chance of being active
            'sort_order' => $this->faker->numberBetween(1, 100),
        ];
    }

    public function featured()
    {
        return $this->state(function (array $attributes) {
            return [
                'featured' => true,
            ];
        });
    }

    public function inactive()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => false,
            ];
        });
    }
}
