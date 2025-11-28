<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'admin',
            'manager',
            'user',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Assign permissions to roles
        $adminRole = Role::findByName('admin');
        $managerRole = Role::findByName('manager');

        // Admin gets all permissions
        $adminRole->givePermissionTo(Permission::all());

        // Manager gets specific permissions
        $managerRole->givePermissionTo([
            'manage_users',
            'manage_dashboard',
            'manage_services',
        ]);
    }
}
