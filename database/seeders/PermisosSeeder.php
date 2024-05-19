<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermisosSeeder extends Seeder
{
    public function run()
    {
        // Crear roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Crear permisos
        $editOwnInfo = Permission::create(['name' => 'edit all info']);
        $buy = Permission::create(['name' => 'buy']);

        // Asignar permisos a roles
        $adminRole->syncPermissions([$editOwnInfo]);
        $userRole->syncPermissions([$buy]);       

        // Crear usuario admin con rol de admin
        $adminUser = User::create([
            'name' => 'Admin',
            'user' => 'admin',
            'email' => 'admin@example.com',            
            'password' => 'admin12345',
        ]);
        $adminUser->assignRole($adminRole);
    }
}