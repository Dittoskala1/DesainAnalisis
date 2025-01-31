<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run(): void 
    {
        // Ensure roles exist
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $customerRole = Role::firstOrCreate(['name' => 'Customer', 'guard_name' => 'web']);
        
        // Assign roles to specific users based on email
        $adminUser = User::where('email', 'admin@admin.com')->first();
        $customerUser = User::where('email', 'cust@admin.com')->first();

        if ($adminUser) {
            $adminUser->assignRole($superAdminRole);
        }

        if ($customerUser) {
            $customerUser->assignRole($customerRole);
        }
    }
}
