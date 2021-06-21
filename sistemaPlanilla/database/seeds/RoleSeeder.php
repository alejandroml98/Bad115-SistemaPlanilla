<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'Editar Bancos']);
        Permission::create(['name' => 'Eliminar Bancos']);
        Permission::create(['name' => 'Crear Bancos']);
        Permission::create(['name' => 'Listar Bancos']);

        Permission::create(['name' => 'Editar Comisiones']);
        Permission::create(['name' => 'Eliminar Comisiones']);
        Permission::create(['name' => 'Crear Comisiones']);
        Permission::create(['name' => 'Listar Comisiones']);

        Permission::create(['name' => 'Editar Centro de Costos']);
        Permission::create(['name' => 'Eliminar Centro de Costos']);
        Permission::create(['name' => 'Crear Centro de Costos']);
        Permission::create(['name' => 'Listar Centro de Costos']);

        Permission::create(['name' => 'Editar Cuenta Bancaria']);
        Permission::create(['name' => 'Eliminar Cuenta Bancaria']);
        Permission::create(['name' => 'Crear Cuenta Bancaria']);
        Permission::create(['name' => 'Listar Cuenta Bancaria']);

        Permission::create(['name' => 'Editar Direcciones']);
        Permission::create(['name' => 'Eliminar Direcciones']);
        Permission::create(['name' => 'Crear Direcciones']);
        Permission::create(['name' => 'Listar Direcciones']);

        Permission::create(['name' => 'Editar Empleados']);
        Permission::create(['name' => 'Eliminar Empleados']);
        Permission::create(['name' => 'Crear Empleados']);
        Permission::create(['name' => 'Listar Empleados']);

        Permission::create(['name' => 'Editar Empresa']);
        Permission::create(['name' => 'Eliminar Empresa']);
        Permission::create(['name' => 'Crear Empresa']);
        Permission::create(['name' => 'Listar Empresa']);

        Permission::create(['name' => 'Editar Estado Civil']);
        Permission::create(['name' => 'Eliminar Estado Civil']);
        Permission::create(['name' => 'Crear Estado Civil']);
        Permission::create(['name' => 'Listar Estado Civil']);
        
        Permission::create(['name' => 'Editar Generos']);
        Permission::create(['name' => 'Eliminar Generos']);
        Permission::create(['name' => 'Crear Generos']);
        Permission::create(['name' => 'Listar Generos']);

        Permission::create(['name' => 'Editar Pais']);
        Permission::create(['name' => 'Eliminar Pais']);
        Permission::create(['name' => 'Crear Pais']);
        Permission::create(['name' => 'Listar Pais']);

        Permission::create(['name' => 'Editar Profesiones']);
        Permission::create(['name' => 'Eliminar Profesiones']);
        Permission::create(['name' => 'Crear Profesiones']);
        Permission::create(['name' => 'Listar Profesiones']);

        Permission::create(['name' => 'Editar Puestos']);
        Permission::create(['name' => 'Eliminar Puestos']);
        Permission::create(['name' => 'Crear Puestos']);
        Permission::create(['name' => 'Listar Puestos']);

        Permission::create(['name' => 'Editar Rango Salarial']);
        Permission::create(['name' => 'Eliminar Rango Salarial']);
        Permission::create(['name' => 'Crear Rango Salarial']);
        Permission::create(['name' => 'Listar Rango Salarial']);

        Permission::create(['name' => 'Editar Regiones']);
        Permission::create(['name' => 'Eliminar Regiones']);
        Permission::create(['name' => 'Crear Regiones']);
        Permission::create(['name' => 'Listar Regiones']);

        Permission::create(['name' => 'Editar Renta']);
        Permission::create(['name' => 'Eliminar Renta']);
        Permission::create(['name' => 'Crear Renta']);
        Permission::create(['name' => 'Listar Renta']);

        Permission::create(['name' => 'Editar SubRegiones']);
        Permission::create(['name' => 'Eliminar SubRegiones']);
        Permission::create(['name' => 'Crear SubRegiones']);
        Permission::create(['name' => 'Listar SubRegiones']);
        
        Permission::create(['name' => 'Editar Tipos de descuento']);
        Permission::create(['name' => 'Eliminar Tipos de descuento']);
        Permission::create(['name' => 'Crear Tipos de descuento']);
        Permission::create(['name' => 'Listar Tipos de descuento']);

        Permission::create(['name' => 'Editar Tipo de documentos']);
        Permission::create(['name' => 'Eliminar Tipo de documentos']);
        Permission::create(['name' => 'Crear Tipo de documentos']);
        Permission::create(['name' => 'Listar Tipo de documentos']);

        Permission::create(['name' => 'Editar Tipo de ingresos']);
        Permission::create(['name' => 'Eliminar Tipo de ingresos']);
        Permission::create(['name' => 'Crear Tipo de ingresos']);
        Permission::create(['name' => 'Listar Tipo de ingresos']);

        Permission::create(['name' => 'Editar Tipo de region']);
        Permission::create(['name' => 'Eliminar Tipo de region']);
        Permission::create(['name' => 'Crear Tipo de region']);
        Permission::create(['name' => 'Listar Tipo de region']);

        Permission::create(['name' => 'Editar Tipo de unidad']);
        Permission::create(['name' => 'Eliminar Tipo de unidad']);
        Permission::create(['name' => 'Crear Tipo de unidad']);
        Permission::create(['name' => 'Listar Tipo de unidad']);

        Permission::create(['name' => 'Editar Unidad']);
        Permission::create(['name' => 'Eliminar Unidad']);
        Permission::create(['name' => 'Crear Unidad']);
        Permission::create(['name' => 'Listar Unidad']);


        Permission::create(['name' => 'Editar Centro de costos de una unidad']);
        Permission::create(['name' => 'Eliminar Centro de costos de una unidad']);
        Permission::create(['name' => 'Crear Centro de costos de una unidad']);
        Permission::create(['name' => 'Listar Centro de costos de una unidad']);

        Permission::create(['name' => 'Editar Usuarios']);
        Permission::create(['name' => 'Eliminar Usuarios']);
        Permission::create(['name' => 'Crear Usuarios']);
        Permission::create(['name' => 'Listar Usuarios']);
        
        Permission::create(['name' => 'Editar Ventas']);
        Permission::create(['name' => 'Eliminar Ventas']);
        Permission::create(['name' => 'Crear Ventas']);
        Permission::create(['name' => 'Listar Ventas']);

        Permission::create(['name' => 'Generar Planilla']);
        Permission::create(['name' => 'Generar Boleta de Pago']);
        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'empleado']);
        $role->givePermissionTo(['Generar Boleta de Pago']);
       // $role->givePermissionTo('edit articles');

        $role = Role::create(['name' => 'Contador']);
        //    ->givePermissionTo(['publish articles', 'unpublish articles']); 

        // or may be done by chaining
        $role = Role::create(['name' => 'auxiliar de planilla']);
        //    ->givePermissionTo(['publish articles', 'unpublish articles']);
        $role->givePermissionTo(['Generar Boleta de Pago', 'Generar Planilla', 'Listar Unidad', 'Editar Unidad', 'Editar Centro de costos de una unidad',
        'Eliminar Centro de costos de una unidad', 'Crear Centro de costos de una unidad', 'Listar Centro de costos de una unidad']);


        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
