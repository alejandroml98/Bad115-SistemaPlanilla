<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuentaBancariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cuenta_bancarias')->insert([
            'cuentaBancaria' => 'Nomal',
            'saldoCuentaBancaria' => 250.52,
            'codigoEmpleado' => 'ER45201',
            'idBanco' => 1
        ]);
        DB::table('cuenta_bancarias')->insert([
            'cuentaBancaria' => 'Nomal',
            'saldoCuentaBancaria' => 250.52,
            'codigoEmpleado' => 'ADMIN12',
            'idBanco' => 1
        ]);
        
        DB::table('cuenta_bancarias')->insert([
            'cuentaBancaria' => 'Nomal',
            'saldoCuentaBancaria' => 250.52,
            'codigoEmpleado' => 'JN85234',
            'idBanco' => 1
        ]);
        DB::table('cuenta_bancarias')->insert([
            'cuentaBancaria' => 'Nomal',
            'saldoCuentaBancaria' => 250.52,
            'codigoEmpleado' => 'PG78523',
            'idBanco' => 1
        ]);
        
        DB::table('cuenta_bancarias')->insert([
            'cuentaBancaria' => 'Nomal',
            'saldoCuentaBancaria' => 250.52,
            'codigoEmpleado' => 'MA78951',
            'idBanco' => 1
        ]);

        DB::table('cuenta_bancarias')->insert([
            'cuentaBancaria' => 'Nomal',
            'saldoCuentaBancaria' => 250.52,
            'codigoEmpleado' => 'KA78951',
            'idBanco' => 1
        ]);
        DB::table('cuenta_bancarias')->insert([
            'cuentaBancaria' => 'Nomal',
            'saldoCuentaBancaria' => 250.52,
            'codigoEmpleado' => 'HU32758',
            'idBanco' => 1
        ]);
        DB::table('cuenta_bancarias')->insert([
            'cuentaBancaria' => 'Nomal',
            'saldoCuentaBancaria' => 250.52,
            'codigoEmpleado' => 'DN75315',
            'idBanco' => 1
        ]);
        DB::table('cuenta_bancarias')->insert([
            'cuentaBancaria' => 'Nomal',
            'saldoCuentaBancaria' => 250.52,
            'codigoEmpleado' => 'LC64820',
            'idBanco' => 1
        ]);

        
        DB::table('cuenta_bancarias')->insert([
            'cuentaBancaria' => 'Nomal',
            'saldoCuentaBancaria' => 250.52,
            'codigoEmpleado' => 'AR93146',
            'idBanco' => 1
        ]);

        DB::table('cuenta_bancarias')->insert([
            'cuentaBancaria' => 'Nomal',
            'saldoCuentaBancaria' => 250.52,
            'codigoEmpleado' => 'MT78430',
            'idBanco' => 1
        ]);

        DB::table('cuenta_bancarias')->insert([
            'cuentaBancaria' => 'Nomal',
            'saldoCuentaBancaria' => 250.52,
            'codigoEmpleado' => 'FR78562',
            'idBanco' => 1
        ]);

        DB::table('cuenta_bancarias')->insert([
            'cuentaBancaria' => 'Nomal',
            'saldoCuentaBancaria' => 4220.52,
            'codigoEmpleado' => 'DG86421',
            'idBanco' => 1
        ]);

        DB::table('cuenta_bancarias')->insert([
            'cuentaBancaria' => 'Nomal',
            'saldoCuentaBancaria' => 1520.52,
            'codigoEmpleado' => 'JL35624',
            'idBanco' => 1
        ]);
    }
}
