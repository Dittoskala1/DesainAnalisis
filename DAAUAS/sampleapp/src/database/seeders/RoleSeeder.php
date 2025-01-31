<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run(): void 
    {
        // Pastikan roles 'super_admin' dan 'Siswa' ada
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $siswaRole = Role::firstOrCreate(['name' => 'Siswa', 'guard_name' => 'web']);

        // Cek dan buat user jika belum ada, lalu beri role
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@admin.com'], // Kondisi untuk memastikan hanya dibuat jika belum ada
            [
                'name' => 'Admin',
                'password' => bcrypt('password'), // Jangan lupa untuk memberikan password
            ]
        );
        $adminUser->assignRole($superAdminRole); // Berikan role super_admin kepada admin

        $siswaUser = User::firstOrCreate(
            ['email' => 'siswa@admin.com'], // Kondisi untuk memastikan hanya dibuat jika belum ada
            [
                'name' => 'Siswa',
                'password' => bcrypt('password'), // Jangan lupa untuk memberikan password
            ]
        );
        $siswaUser->assignRole($siswaRole); // Berikan role Siswa kepada siswa
    }
}
