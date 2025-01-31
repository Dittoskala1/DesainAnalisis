<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder untuk role dan permission
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            MataPelajaranSeeder::class,
        ]);

        // Membuat Admin Default
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],  // Cek jika user sudah ada berdasarkan email
            [
                'name' => 'Admin',
                'password' => bcrypt('password'), // Pastikan memberi password yang aman
            ]
        );

        // Pastikan role admin sudah ada
        $adminRole = Role::firstOrCreate(
            ['name' => 'admin', 'guard_name' => 'web']  // Cek jika role 'admin' sudah ada
        );

        // Memberikan Role Admin kepada User
        $admin->assignRole($adminRole);
    }
}
