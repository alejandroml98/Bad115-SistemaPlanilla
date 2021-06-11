<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoUnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'ER45201',
            'codigoUnidad' => 'AS00425',
            'esJefe' => 'F'
            ]);

        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'ADMIN12',
            'codigoUnidad' => 'DI11002',
            'esJefe' => 'T'
            ]);

        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'JU12374',
            'codigoUnidad' => 'AR00234',
            'esJefe' => 'T'
            ]);

        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'JN85234',
            'codigoUnidad' => 'SP00002',
            'esJefe' => 'T'
            ]);
        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'PG78523',
            'codigoUnidad' => 'SP00002',
            'esJefe' => 'F'
            ]);
        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'MA78951',
            'codigoUnidad' => 'SP00002',
            'esJefe' => 'F'
            ]);
        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'KA78951',
            'codigoUnidad' => 'SP00002',
            'esJefe' => 'F'
            ]);

        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'HU32758',
            'codigoUnidad' => 'SP00001',
            'esJefe' => 'F'
            ]);
        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'DN75315',
            'codigoUnidad' => 'SP00001',
            'esJefe' => 'F'
            ]);

        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'LC64820',
            'codigoUnidad' => 'SP00001',
            'esJefe' => 'F'
            ]);
        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'AR93146',
            'codigoUnidad' => 'SP00001',
            'esJefe' => 'T'
            ]);
        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'MT78430',
            'codigoUnidad' => 'SP00001',
            'esJefe' => 'F'
            ]);

        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'FR78562',
            'codigoUnidad' => 'AS00425',
            'esJefe' => 'T'
            ]);
        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'DG86421',
            'codigoUnidad' => 'AR00234',
            'esJefe' => 'F'
            ]);
        DB::table('unidad_empleados')->insert([
            'codigoEmpleado'=>'JL35624',
            'codigoUnidad' => 'AR00234',
            'esJefe' => 'F'
            ]);
    }

}
