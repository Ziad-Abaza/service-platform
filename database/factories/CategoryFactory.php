<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        $name = $this->faker->unique()->words(2, true);
        
        return [
            'parent_id' => null,
            'name_ar' => 'فئة ' . $this->faker->word(),
            'name_en' => $name,
            'description_ar' => 'وصف الفئة بالعربية',
            'description_en' => $this->faker->paragraph(3),
            'sort_order' => $this->faker->numberBetween(1, 100),
            'is_active' => $this->faker->boolean(90), // 90% chance of being active
            'meta_title_ar' => 'عنوان ميتا بالعربية',
            'meta_title_en' => $this->faker->sentence(),
            'meta_description_ar' => 'وصف ميتا بالعربية',
            'meta_description_en' => $this->faker->sentence(),
        ];
    }

    public function withParent()
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => Category::factory(),
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
