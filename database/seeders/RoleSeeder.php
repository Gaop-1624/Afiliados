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
                                'description' => 'Control y Manejo del Sistema']);
        $role2 = Role::create(['name' => 'Afiliaciones',
                                'description' => 'Registro y Manejo de las Afiliacion']);
        $role3 = Role::create(['name' => 'Pagos',
                                'description' => 'Hacer Aportes al Sistema']);
        $role4 = Role::create(['name' => 'Planillas',
                                'description' => 'Generacion de Planillas Pila']);
        $role5 = Role::create(['name' => 'Reportes',
                                'description' => 'Generacion de Reportes']);


        Permission::create(['name' => 'admin.afiliaciones.menu',
                                'description' => 'Menu Afiliaciones'])->syncRoles([$role1], [$role2]); 
        Permission::create(['name' => 'admin.config.menu',
                                'description' => 'Menu Configuracion'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.pagos.menu',
                                'description' => 'Menu pagos'])->syncRoles([$role1], [$role2]); 
        Permission::create(['name' => 'admin.planillas.menu',
                                'description' => 'Menu Planillas'])->syncRoles([$role1], [$role2]); 
        Permission::create(['name' => 'admin.reportes.menu',
                                'description' => 'Menu Reportes'])->syncRoles([$role1], [$role2]);
      
        Permission::create(['name' => 'admin.empresa.index',
                                'description' => 'Listado de Empresas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.index',
                                'description' => 'Listado de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.index',
                                'description' => 'Listado de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.afiliados.index',
                                'description' => 'Listado de Afiliados'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.salario.index',
                                'description' => 'Listado de Salarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.planillas.index',
                                'description' => 'Listado de Planillas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.pagos.index',
                                'description' => 'Listado de Pagos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.reportes.index',
                                'description' => 'Listado de Reportes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.reportesdia.index',
                                'description' => 'Listado de Reportes diarios'])->syncRoles([$role1, $role2, $role5]);
        Permission::create(['name' => 'admin.reportesmes.index',
                                'description' => 'Listado de Reportes Mensuales'])->syncRoles([$role1, $role2, $role5]);
        Permission::create(['name' => 'admin.reportesano.index',
                                'description' => 'Listado de Reportes año'])->syncRoles([$role1, $role2, $role5]);
        Permission::create(['name' => 'admin.arl.index',
                                'description' => 'Listado Riesgo(ARL)'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.afp.index',
                                'description' => 'Listado pension(FP)'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.eps.index',
                                'description' => 'Listado Salud(EPS)'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.caja.index',
                                'description' => 'Listado Caja Compensacion'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.retiros.index',
                                'description' => 'Listado Retiros Afiliados'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.create',
                                'description' => 'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create',
                                'description' => 'Crear Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.afiliados.create',
                                'description' => 'Crear Afiliados'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.arl.create',
                                'description' => 'Crear Riesgo(ARL)'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.afp.create',
                                'description' => 'Crear pension(FP)'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.eps.create',
                                'description' => 'Crear Salud(EPS)'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.caja.create',
                                'description' => 'Crear Caja Compensacion'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.planillas.create',
                                'description' => 'Crear Planillas'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'admin.pagos.create',
                                'description' => 'Crear Pagos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.reportes.create',
                                'description' => 'Crear Reportes'])->syncRoles([$role1, $role2, $role5]);
        Permission::create(['name' => 'admin.retiros.create',
                                'description' => 'Crear Retiros'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.empresa.create',
                                'description' => 'Crear Empresa'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.edict',
                                    'description' => 'Edictar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edict',
                                    'description' => 'Edictar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.afiliados.edict',
                                    'description' => 'Edictar Afiliados'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.planillas.edict',
                                    'description' => 'Edictar Planillas'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'admin.pagos.edict',
                                    'description' => 'Edictar Pagos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.reportes.edict',
                                    'description' => 'Edictar Reportes'])->syncRoles([$role1, $role2, $role5]);
        Permission::create(['name' => 'admin.empresa.edit',
                                'description' => 'Actualizar Datos Empresa'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.salario.edict',
                                    'description' => 'Edictar Salario'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.arl.edict',
                                'description' => 'Editar Riesgo(ARL)'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.afp.edict',
                                'description' => 'Editar pension(FP)'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.eps.edict',
                                'description' => 'Editar Salud(EPS)'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.caja.edict',
                                'description' => 'Editar Caja Compensacion'])->syncRoles([$role1, $role2]);


        Permission::create(['name' => 'admin.users.delete',
                                    'description' => 'Eliminar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.delete',
                                    'description' => 'Eliminar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.afiliados.delete',
                                    'description' => 'Eliminar Afiliados'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.planillas.delete',
                                    'description' => 'Eliminar Planillas'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'admin.pagos.delete',
                                    'description' => 'Eliminar Pagos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.reportes.delete',
                                    'description' => 'Eliminar Reportes'])->syncRoles([$role1, $role2, $role5]);
        Permission::create(['name' => 'admin.arl.delete',
                                'description' => 'Eliminar Riesgo(ARL)'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.afp.delete',
                                'description' => 'Eliminar pension(FP)'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.eps.delete',
                                'description' => 'Eliminar Salud(EPS)'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.caja.delete',
                                'description' => 'Eliminar Caja Compensacion'])->syncRoles([$role1, $role2]);

                                    

    }
}
