<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentaEmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('ventas_empleados')->insert([
                'codigoEmpleado' => 'ER45201',
                'valorVenta' => 450,
                'fechaVenta' => '2021/05/12'
                ]);
            DB::table('ventas_empleados')->insert([
                'codigoEmpleado' => 'ADMIN12',
                'valorVenta' => 500,
                'fechaVenta' => '2021/02/25'
                ]);
            DB::table('ventas_empleados')->insert([
                'codigoEmpleado' => 'JU12374',
                'valorVenta' => 320,
            'fechaVenta' => '2021/02/02'
                ]);
            DB::table('ventas_empleados')->insert([
                'codigoEmpleado' => 'JN85234',
                'valorVenta' => 720.52,
            'fechaVenta' => '2021/05/12'
                ]);
    
            DB::table('ventas_empleados')->insert([
                'codigoEmpleado' => 'PG78523',
                'valorVenta' => 240.56,
            'fechaVenta' => '2021/6/20'
                ]);
            DB::table('ventas_empleados')->insert([
                'codigoEmpleado' => 'MA78951',
                'valorVenta' => 862.01,
                'fechaVenta' => '2021/08/30'
                ]);



                DB::table('ventas_empleados')->insert([
                    'codigoEmpleado' => 'KA78951',
                    'valorVenta' => 750.02,
                    'fechaVenta' => '2021/08/30'
                    ]);

                DB::table('ventas_empleados')->insert([
                    'codigoEmpleado' => 'HU32758',
                    'valorVenta' => 420,
                    'fechaVenta' => '2021/08/30'
                    ]);
                DB::table('ventas_empleados')->insert([
                    'codigoEmpleado' => 'DN75315',
                    'valorVenta' => 785,
                    'fechaVenta' => '2021/08/30'
                    ]);
                DB::table('ventas_empleados')->insert([
                    'codigoEmpleado' => 'LC64820',
                    'valorVenta' => 752.20,
                    'fechaVenta' => '2021/08/30'
                    ]);
                DB::table('ventas_empleados')->insert([
                    'codigoEmpleado' => 'AR93146',
                    'valorVenta' => 425.00,
                    'fechaVenta' => '2021/08/30'
                    ]);
                DB::table('ventas_empleados')->insert([
                    'codigoEmpleado' => 'MT78430',
                    'valorVenta' => 521.30,
                    'fechaVenta' => '2021/08/30'
                    ]);
                DB::table('ventas_empleados')->insert([
                    'codigoEmpleado' => 'FR78562',
                    'valorVenta' => 420.30,
                    'fechaVenta' => '2021/08/30'
                    ]);
                DB::table('ventas_empleados')->insert([
                    'codigoEmpleado' => 'DG86421',
                    'valorVenta' => 524.12,
                    'fechaVenta' => '2021/08/30'
                    ]);
                DB::table('ventas_empleados')->insert([
                    'codigoEmpleado' => 'JL35624',
                    'valorVenta' => 500.99,
                    'fechaVenta' => '2021/08/30'
                    ]);
            
    }
}
