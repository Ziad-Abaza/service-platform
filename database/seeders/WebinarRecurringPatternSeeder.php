<?php

namespace Database\Seeders;

use App\Models\WebinarRecurringPattern;
use Illuminate\Database\Seeder;

class WebinarRecurringPatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patterns = [
            [
                'type' => 'weekly',
                'days_of_week' => json_encode(['monday', 'wednesday', 'friday']),
                'day_of_month' => null,
            ],
            [
                'type' => 'weekly',
                'days_of_week' => json_encode(['tuesday', 'thursday']),
                'day_of_month' => null,
            ],
            [
                'type' => 'monthly',
                'days_of_week' => null,
                'day_of_month' => 15,
            ],
            [
                'type' => 'daily',
                'days_of_week' => json_encode(['monday', 'tuesday', 'wednesday', 'thursday', 'friday']),
                'day_of_month' => null,
            ],
        ];

        foreach ($patterns as $pattern) {
            WebinarRecurringPattern::firstOrCreate(
                ['type' => $pattern['type'], 'day_of_month' => $pattern['day_of_month']],
                $pattern
            );
        }
    }
}
