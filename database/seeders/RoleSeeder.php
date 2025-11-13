<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrador',
                                'description' => 'Control del Sistema']);
        $role2 = Role::create(['name' => 'Planillas',
                                'description' => 'Venta de Afiliaciones']);
        $role3 = Role::create(['name' => 'Pagos',
                                'description' => 'Pagos por Mes']);
        $role4 = Role::create(['name' => 'Afiliaciones',
                                'description' => 'Registrar Afiliacion']);
        $role5 = Role::create(['name' => 'Reportes',
                                'description' => 'Generar Reportes']);


        Permission::create(['name' => 'admin.empresa.edit',
                                'description' => 'Actualizar Datos Empresa'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.roles.index',
                                'description' => 'Listado de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.index',
                                'description' => 'Listado de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.afiliados.index',
                                'description' => 'Listado de Afiliados'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.planillas.index',
                                'description' => 'Listado de Plantillas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.pagos.index',
                                'description' => 'Listado de Pagos'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.reportes.index',
                                'description' => 'Listado de Reportes'])->syncRoles([$role1, $role5]);

        Permission::create(['name' => 'admin.users.create',
                                'description' => 'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create',
                                'description' => 'Crear Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.afiliados.create',
                                'description' => 'Crear Afiliados'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.planillas.create',
                                'description' => 'Crear Plantillas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.pagos.create',
                                'description' => 'Crear Pagos'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.reportes.create',
                                'description' => 'Crear Reportes'])->syncRoles([$role1, $role5]);

        Permission::create(['name' => 'admin.users.edict',
                                    'description' => 'Edictar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edict',
                                    'description' => 'Edictar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.afiliados.edict',
                                    'description' => 'Edictar Afiliados'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.planillas.edict',
                                    'description' => 'Edictar Plantillas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.pagos.edict',
                                    'description' => 'Edictar Pagos'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.reportes.edict',
                                    'description' => 'Edictar Reportes'])->syncRoles([$role1, $role5]);

        Permission::create(['name' => 'admin.users.delete',
                                    'description' => 'Eliminar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.delete',
                                    'description' => 'Eliminar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.afiliados.delete',
                                    'description' => 'Eliminar Afiliados'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.planillas.delete',
                                    'description' => 'Eliminar Plantillas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.pagos.delete',
                                    'description' => 'Eliminar Pagos'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.reportes.delete',
                                    'description' => 'Eliminar Reportes'])->syncRoles([$role1, $role5]);

    }
}
