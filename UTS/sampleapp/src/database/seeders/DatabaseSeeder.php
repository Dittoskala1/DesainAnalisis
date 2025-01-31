<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed the roles first
        $this->call(RoleSeeder::class);

        // Seed users after roles exist
        $this->seedUsers();
        
        $this->call(PermissionSeeder::class);
        // Seed orders data after users are seeded
        $this->call(OrderSeeder::class);
    }

    private function seedUsers(): void
    {
        // Create Admin user if not exists
        $adminEmail = 'admin@admin.com';
        if (! User::where('email', $adminEmail)->exists()) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => $adminEmail,
                'password' => bcrypt('password'),
            ]);
            $admin->assignRole('super_admin');
        }

        // Create Customer user if not exists
        $custEmail = 'cust@admin.com';
        if (! User::where('email', $custEmail)->exists()) {
            $customer = User::create([
                'name' => 'Customer',
                'email' => $custEmail,
                'password' => bcrypt('password'),
            ]);
            $customer->assignRole('Customer');
        }
    }
}
 