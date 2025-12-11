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
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            // SettingSeeder::class,
        ]);

        // User::factory(10)->create();

        $admin = User::factory()->create([
            'name' => 'ziad hassan',
            'email' => 'zeyad.h.abaza@gmail.com',
            'password' => encrypt('123456789'),
            'email_verified_at' => now(),
        ]);
        
        // assign role to user
        $admin->assignRole('admin');
    }
}
