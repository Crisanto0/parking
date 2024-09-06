<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Usuario;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Crear roles
        $adminRole = Role::create(['name' => 'admin']);
        $employeeRole = Role::create(['name' => 'empleado']);

        // Obtener todos los usuarios
        $usuarios = Usuario::all();

        foreach ($usuarios as $usuario) {
            // Asignar rol basado en el campo Rol_id
            if ($usuario->rol_id == 1) {
                $usuario->assignRole('admin'); // Asigna el rol de admin si Rol_id es 1
            } elseif ($usuario->rol_id == 2) {
                $usuario->assignRole('empleado'); // Asigna el rol de empleado si Rol_id es 2
            }
        }
    }
}
