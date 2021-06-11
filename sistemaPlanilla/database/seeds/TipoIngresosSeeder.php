<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoIngresosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_ingresos')->insert([
            'nombreTipoIngresos' => 'Bonificacion'
        ]);
        DB::table('tipo_ingresos')->insert([
            'nombreTipoIngresos' => 'Regalias'
        ]);
        DB::table('tipo_ingresos')->insert([
            'nombreTipoIngresos' => 'Viaticos'
        ]);
    }
}
