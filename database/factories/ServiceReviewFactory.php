<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\ServiceReview;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceReviewFactory extends Factory
{
    protected $model = ServiceReview::class;

    public function definition()
    {
        $statuses = ['pending', 'approved', 'rejected'];
        
        return [
            'service_id' => Service::factory(),
            'user_id' => User::factory(),
            'parent_id' => null,
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->paragraph,
            'status' => $this->faker->randomElement($statuses),
        ];
    }

    public function approved()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'approved',
            ];
        });
    }

    public function pending()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'pending',
            ];
        });
    }

    public function withReply()
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => ServiceReview::factory(),
            ];
        });
    }
}
