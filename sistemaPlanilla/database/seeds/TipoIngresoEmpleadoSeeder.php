<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoIngresoEmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipoingresos_empleados')->insert([
            'valoTipoIngresoEmpleado' => 425.10,
            'contadorTipoIngresoEmpleado' => 2,
            'codigoEmpleado' => 'ER45201',
            'idTipoIngresos' => 1
            ]);
        DB::table('tipoingresos_empleados')->insert([
            'valoTipoIngresoEmpleado' => 435.10,
            'contadorTipoIngresoEmpleado' => 3,
            'codigoEmpleado' => 'ADMIN12',
            'idTipoIngresos' => 3
            ]);
        DB::table('tipoingresos_empleados')->insert([
            'valoTipoIngresoEmpleado' => 785.75,
            'contadorTipoIngresoEmpleado' => 1,
            'codigoEmpleado' => 'JU12374',
            'idTipoIngresos' => 2
            ]);
        DB::table('tipoingresos_empleados')->insert([
            'valoTipoIngresoEmpleado' => 475.12,
            'contadorTipoIngresoEmpleado' => 3,
            'codigoEmpleado' => 'JN85234',
            'idTipoIngresos' => 2
            ]);
        DB::table('tipoingresos_empleados')->insert([
            'valoTipoIngresoEmpleado' => 221.19,
            'contadorTipoIngresoEmpleado' => 3,
            'codigoEmpleado' => 'MA78951',
            'idTipoIngresos' => 3
            ]);
        DB::table('tipoingresos_empleados')->insert([
            'valoTipoIngresoEmpleado' => 245.60,
            'contadorTipoIngresoEmpleado' => 2,
            'codigoEmpleado' => 'KA78951',
            'idTipoIngresos' => 1
            ]);
        DB::table('tipoingresos_empleados')->insert([
            'valoTipoIngresoEmpleado' => 123.10,
            'contadorTipoIngresoEmpleado' => 1,
            'codigoEmpleado' => 'HU32758',
            'idTipoIngresos' => 2
            ]);
        DB::table('tipoingresos_empleados')->insert([
            'valoTipoIngresoEmpleado' => 865.10,
            'contadorTipoIngresoEmpleado' => 3,
            'codigoEmpleado' => 'DN75315',
            'idTipoIngresos' => 3
            ]);
        DB::table('tipoingresos_empleados')->insert([
            'valoTipoIngresoEmpleado' => 754.10,
            'contadorTipoIngresoEmpleado' => 3,
            'codigoEmpleado' => 'LC64820',
            'idTipoIngresos' => 2
            ]);
        DB::table('tipoingresos_empleados')->insert([
            'valoTipoIngresoEmpleado' => 865.10,
            'contadorTipoIngresoEmpleado' => 3,
            'codigoEmpleado' => 'AR93146',
            'idTipoIngresos' => 1
            ]);            
        DB::table('tipoingresos_empleados')->insert([
            'valoTipoIngresoEmpleado' => 371.10,
            'contadorTipoIngresoEmpleado' => 3,
            'codigoEmpleado' => 'MT78430',
            'idTipoIngresos' => 2
            ]);
        DB::table('tipoingresos_empleados')->insert([
            'valoTipoIngresoEmpleado' => 632.10,
            'contadorTipoIngresoEmpleado' => 3,
            'codigoEmpleado' => 'FR78562',
            'idTipoIngresos' => 3
            ]);
        DB::table('tipoingresos_empleados')->insert([
            'valoTipoIngresoEmpleado' => 421.10,
            'contadorTipoIngresoEmpleado' => 3,
            'codigoEmpleado' => 'DG86421',
            'idTipoIngresos' => 1
            ]);
        DB::table('tipoingresos_empleados')->insert([
            'valoTipoIngresoEmpleado' => 854.10,
            'contadorTipoIngresoEmpleado' => 3,
            'codigoEmpleado' => 'JL35624',
            'idTipoIngresos' => 2
            ]);
    }









}
