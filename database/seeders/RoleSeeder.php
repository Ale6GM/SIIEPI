<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name'=>'Administrador']);
        $role2 = Role::create(['name'=>'Registrador']);
        $role3 = Role::create(['name'=>'Supervisor']);

        //Permisos para los Usuarios
        Permission::create(['name' => 'admin.usuarios.index', 'description' => 'Ver Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.create', 'description' => 'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.edit', 'description' => 'Editar Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.update', 'description' => 'Actualizar Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.destroy', 'description' => 'Eliminar Usuarios'])->syncRoles([$role1]);

        // Permisos para los Roles
        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar Rol'])->syncRoles([$role1]);
        //Permisos para las Areas
        Permission::create(['name' => 'admin.areas.index', 'description' => 'Ver Areas'])->syncRoles([$role1,$role2, $role3]);
        Permission::create(['name' => 'admin.areas.create', 'description' => 'Crear Area'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.areas.edit', 'description' => 'Editar Area'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.areas.destroy', 'description' => 'Eliminar Area'])->syncRoles([$role1]);

        //Permisos para las Computadoras
        Permission::create(['name'=> 'admin.computadoras.index', 'description' => 'Ver Computadoras'])->syncRoles([$role1,$role2, $role3]);
        Permission::create(['name'=> 'admin.computadoras.create', 'description' => 'Crear Computadora'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'admin.computadoras.edit', 'description' => 'Editar Computadora'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.computadoras.destroy', 'description' => 'Eliminar Computadora'])->syncRoles([$role1]);

        //Permisos para los Sistemas

        Permission::create(['name'=> 'admin.sistemas.index', 'description' => 'Ver Sistemas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=> 'admin.sistemas.create', 'description' => 'Crear Sistema'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.sistemas.edit', 'description' => 'Editar Sistema'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.sistemas.destroy', 'description' => 'Eliminar Sistema'])->syncRoles([$role1]);

        //Permisos para las Roturas
        Permission::create(['name'=>'admin.roturas.index', 'description' => 'Ver Roturas'])->syncRoles([$role1,$role2, $role3]);
        Permission::create(['name'=>'admin.roturas.create', 'description' => 'Crear Rotura'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.roturas.edit', 'description' => 'Editar Rotura'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.roturas.destroy', 'description' => 'Eliminar Rotura'])->syncRoles([$role1]);

        //Permisos para las Actividades
        Permission::create(['name'=> 'admin.actividades.index', 'description' => 'Ver Actividades'])->syncRoles([$role1,$role2, $role3]);
        Permission::create(['name'=> 'admin.actividades.create', 'description' => 'Crear Actividad'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'admin.actividades.edit', 'description' => 'Editar Actividad'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.actividades.destroy', 'description' => 'Eliminar Actividad'])->syncRoles([$role1]);

        //Permisos para los UPS
        Permission::create(['name'=>'admin.ups.index', 'description' => 'Ver Ups'])->syncRoles([$role1,$role2, $role3]);
        Permission::create(['name'=>'admin.ups.create', 'description' => 'Crear Ups'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.ups.edit', 'description' => 'Editar Ups'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.ups.destroy', 'description' => 'Eliminar Ups'])->syncRoles([$role1]);


        //Permisos para las Estadisticas

        Permission::create(['name'=> 'admin.estadisticas', 'description' => 'Ver Estadisticas'])->syncRoles([$role1,$role2, $role3]);

        //Permisos para exportar

        Permission::create(['name'=>'exportar_ups', 'description' => 'Exportar UPS'])->syncRoles([$role1,$role2, $role3]);
        Permission::create(['name'=>'exportar_pc', 'description' => 'Exportar Computadora'])->syncRoles([$role1,$role2, $role3]);
        Permission::create(['name'=>'exportar_area', 'description' => 'Exportar Areas'])->syncRoles([$role1,$role2, $role3]);

    }
}
