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
        Permission::create(['name' => 'edit bancos']);
        Permission::create(['name' => 'delete bancos']);
        Permission::create(['name' => 'publish bancos']);
        Permission::create(['name' => 'unpublish bancos']);

        Permission::create(['name' => 'edit catalogo_comisions']);
        Permission::create(['name' => 'delete catalogo_comisions']);
        Permission::create(['name' => 'publish catalogo_comisions']);
        Permission::create(['name' => 'unpublish catalogo_comisions']);

        Permission::create(['name' => 'edit centro_costos']);
        Permission::create(['name' => 'delete centro_costos']);
        Permission::create(['name' => 'publish centro_costos']);
        Permission::create(['name' => 'unpublish centro_costos']);

        Permission::create(['name' => 'edit cuenta_bancarias']);
        Permission::create(['name' => 'delete cuenta_bancarias']);
        Permission::create(['name' => 'publish cuenta_bancarias']);
        Permission::create(['name' => 'unpublish cuenta_bancarias']);

        Permission::create(['name' => 'edit direccions']);
        Permission::create(['name' => 'delete direccions']);
        Permission::create(['name' => 'publish direccions']);
        Permission::create(['name' => 'unpublish direccions']);

        Permission::create(['name' => 'edit empleados']);
        Permission::create(['name' => 'delete empleados']);
        Permission::create(['name' => 'publish empleados']);
        Permission::create(['name' => 'unpublish empleados']);

        Permission::create(['name' => 'edit empresas']);
        Permission::create(['name' => 'delete empresas']);
        Permission::create(['name' => 'publish empresas']);
        Permission::create(['name' => 'unpublish empresas']);

        Permission::create(['name' => 'edit estado_civils']);
        Permission::create(['name' => 'delete estado_civils']);
        Permission::create(['name' => 'publish estado_civils']);
        Permission::create(['name' => 'unpublish estado_civils']);
        
        Permission::create(['name' => 'edit generos']);
        Permission::create(['name' => 'delete generos']);
        Permission::create(['name' => 'publish generos']);
        Permission::create(['name' => 'unpublish generos']);

        Permission::create(['name' => 'edit pais']);
        Permission::create(['name' => 'delete pais']);
        Permission::create(['name' => 'publish pais']);
        Permission::create(['name' => 'unpublish pais']);

        Permission::create(['name' => 'edit profesions']);
        Permission::create(['name' => 'delete profesions']);
        Permission::create(['name' => 'publish profesions']);
        Permission::create(['name' => 'unpublish profesions']);

        Permission::create(['name' => 'edit puestos']);
        Permission::create(['name' => 'delete puestos']);
        Permission::create(['name' => 'publish puestos']);
        Permission::create(['name' => 'unpublish puestos']);

        Permission::create(['name' => 'edit rango_salarials']);
        Permission::create(['name' => 'delete rango_salarials']);
        Permission::create(['name' => 'publish rango_salarials']);
        Permission::create(['name' => 'unpublish rango_salarials']);

        Permission::create(['name' => 'edit regions']);
        Permission::create(['name' => 'delete regions']);
        Permission::create(['name' => 'publish regions']);
        Permission::create(['name' => 'unpublish regions']);

        Permission::create(['name' => 'edit rentas']);
        Permission::create(['name' => 'delete rentas']);
        Permission::create(['name' => 'publish rentas']);
        Permission::create(['name' => 'unpublish rentas']);

        Permission::create(['name' => 'edit sub_regions']);
        Permission::create(['name' => 'delete sub_regions']);
        Permission::create(['name' => 'publish sub_regions']);
        Permission::create(['name' => 'unpublish sub_regions']);
        
        Permission::create(['name' => 'edit tipo_descuentos']);
        Permission::create(['name' => 'delete tipo_descuentos']);
        Permission::create(['name' => 'publish tipo_descuentos']);
        Permission::create(['name' => 'unpublish tipo_descuentos']);

        Permission::create(['name' => 'edit tipo_documentos']);
        Permission::create(['name' => 'delete tipo_documentos']);
        Permission::create(['name' => 'publish tipo_documentos']);
        Permission::create(['name' => 'unpublish tipo_documentos']);

        Permission::create(['name' => 'edit tipo_ingresos']);
        Permission::create(['name' => 'delete tipo_ingresos']);
        Permission::create(['name' => 'publish tipo_ingresos']);
        Permission::create(['name' => 'unpublish tipo_ingresos']);

        Permission::create(['name' => 'edit tipo_regions']);
        Permission::create(['name' => 'delete tipo_regions']);
        Permission::create(['name' => 'publish tipo_regions']);
        Permission::create(['name' => 'unpublish tipo_regions']);

        Permission::create(['name' => 'edit tipo_unidads']);
        Permission::create(['name' => 'delete tipo_unidads']);
        Permission::create(['name' => 'publish tipo_unidads']);
        Permission::create(['name' => 'unpublish tipo_unidads']);

        Permission::create(['name' => 'edit unidads']);
        Permission::create(['name' => 'delete unidads']);
        Permission::create(['name' => 'publish unidads']);
        Permission::create(['name' => 'unpublish unidads']);


        Permission::create(['name' => 'edit unidad_centrocostos']);
        Permission::create(['name' => 'delete unidad_centrocostos']);
        Permission::create(['name' => 'publish unidad_centrocostos']);
        Permission::create(['name' => 'unpublish unidad_centrocostos']);

        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'publish users']);
        Permission::create(['name' => 'unpublish users']);
        
        Permission::create(['name' => 'edit ventas_empleados']);
        Permission::create(['name' => 'delete ventas_empleados']);
        Permission::create(['name' => 'publish ventas_empleados']);
        Permission::create(['name' => 'unpublish ventas_empleados']);

        Permission::create(['name' => 'GenerarPlanilla']);
        Permission::create(['name' => 'GenerarBoletaPago']);
        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'empleado']);
       // $role->givePermissionTo('edit articles');

        $role = Role::create(['name' => 'Contador']);
        //    ->givePermissionTo(['publish articles', 'unpublish articles']); 

        // or may be done by chaining
        $role = Role::create(['name' => 'auxiliar de planilla']);
        //    ->givePermissionTo(['publish articles', 'unpublish articles']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
