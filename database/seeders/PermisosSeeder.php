<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
            'nombre' => 'Admin',
            'dni'=>12345678,
            'telefono'=>123456789,
            'ubicacion'=>'no tengo idea',
            'user' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'admin12345',
        ]);
        $adminUser->assignRole($adminRole);
    }
}