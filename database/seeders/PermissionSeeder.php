<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // User management
            'manage_users',
            
            // Role management
            'manage_roles',
            
            // Permission management
            'manage_permissions',
            
            // Settings management
            'manage_settings',
            
            // Dashboard access
            'manage_dashboard',

            // manage services
            'manage_services',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
