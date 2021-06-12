<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesionEmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'ER45201',
            'idProfesion' => 1
            ]);
        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'ADMIN12',
            'idProfesion' => 2
            ]);
        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'JU12374',
            'idProfesion' => 3
            ]);
        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'JN85234',
            'idProfesion' => 4
            ]);

        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'PG78523',
            'idProfesion' => 5
            ]);
        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'MA78951',
            'idProfesion' => 6
            ]);
        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'KA78951',
            'idProfesion' => 1
            ]);
        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'HU32758',
            'idProfesion' => 1
            ]);
        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'DN75315',
            'idProfesion' => 3
            ]);
        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'LC64820',
            'idProfesion' => 2
            ]);
        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'AR93146',
            'idProfesion' => 2
            ]);
        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'MT78430',
            'idProfesion' => 3
            ]);
        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'FR78562',
            'idProfesion' => 4
            ]);

        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'DG86421',
            'idProfesion' => 5
            ]);
        DB::table('profesion_empleados')->insert([
            'codigoEmpleado' => 'JL35624',
            'idProfesion' => 6
            ]);
    }
}
