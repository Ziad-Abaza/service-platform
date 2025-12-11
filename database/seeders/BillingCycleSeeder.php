<?php

namespace Database\Seeders;

use App\Models\BillingCycle;
use Illuminate\Database\Seeder;

class BillingCycleSeeder extends Seeder
{
    public function run()
    {
        $cycles = [
            [
                'name' => 'monthly',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'quarterly',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'semi_annually',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'annually',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'one_time',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($cycles as $cycle) {
            BillingCycle::updateOrCreate(
                ['name' => $cycle['name']],
                $cycle
            );
        }
    }
}
