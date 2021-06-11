<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CentroCostosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('centro_costos')->insert([
            'presupuestoInicial' => 150000.56
        ]);
        DB::table('centro_costos')->insert([
            'presupuestoInicial' => 7564824.78
        ]);
        DB::table('centro_costos')->insert([
            'presupuestoInicial' => 456237.85
        ]);
        DB::table('centro_costos')->insert([
            'presupuestoInicial' => 895623.42
        ]);
        DB::table('centro_costos')->insert([
            'presupuestoInicial' => 45567891.75
        ]);
        DB::table('centro_costos')->insert([
            'presupuestoInicial' => 48867875.75
        ]);
    }
}
