<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed roles and permissions first
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            SettingSeeder::class, // Uncomment if you have settings to seed
        ]);

        // 2. Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );
        $admin->assignRole('admin');
        
        // 3. Create some test users with user role
        if (!app()->environment('production')) {
            User::factory(5)->create()->each(function ($user) {
                $user->assignRole('user');
            });
        }
        
        // 4. Seed reference data (order matters due to foreign key constraints)
        $this->call([
            BillingCycleSeeder::class,  // No dependencies
            CategorySeeder::class,      // No dependencies
            FeatureSeeder::class,       // No dependencies
        ]);
        
        // 5. Seed services and their relationships (depends on categories and features)
        $this->call([
            ServiceSeeder::class,          // Depends on categories and features
            ServiceWebinarSeeder::class,   // Depends on services
            ServiceComparisonSeeder::class, // Depends on services
        ]);
        
        // 6. Seed pricing plan features (depends on services and features)
        $this->call([
            PricingPlanFeatureSeeder::class, 
            WebinarRecurringPatternSeeder::class,
        ]);
    }
}
