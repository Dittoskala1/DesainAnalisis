<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Create permission if they don't exist
        $permissions = [
            'view_order',  // Customer hanya bisa melihat pesanan mereka
            'view_any_order' // Admin bisa melihat semua pesanan
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Get or create the 'Customer' role
        $role = Role::firstOrCreate(['name' => 'Customer']); 

        // Assign the permissions to the 'Customer' role
        $role->givePermissionTo($permission); // Customer hanya diberikan permission untuk melihat pesanan mereka
    }
}

