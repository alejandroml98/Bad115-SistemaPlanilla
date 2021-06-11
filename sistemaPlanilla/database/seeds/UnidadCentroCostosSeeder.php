<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadCentroCostosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidad_centrocostos')->insert([
            'presupuestoFinal' => 3000.52,
            'gastoTotal' => 7856.2,
            'anio' => '2010/02/12',
            'codigoUnidad' => 'RH78523',
            'idCentroCostos' =>1
            ]);

        DB::table('unidad_centrocostos')->insert([
            'presupuestoFinal' => 3000.52,
            'gastoTotal' => 7856.2,
            'anio' => '2012/02/12',
            'codigoUnidad' => 'DI11002',
            'idCentroCostos' =>2
            ]);
        DB::table('unidad_centrocostos')->insert([
            'presupuestoFinal' => 3000.52,
            'gastoTotal' => 7856.2,
            'anio' => '2015/10/12',
            'codigoUnidad' => 'AR00234',
            'idCentroCostos' =>3
            ]);
        DB::table('unidad_centrocostos')->insert([
            'presupuestoFinal' => 3000.52,
            'gastoTotal' => 7856.2,
            'anio' => '2015/10/12',
            'codigoUnidad' => 'AS00425',
            'idCentroCostos' =>4
            ]);
        DB::table('unidad_centrocostos')->insert([
            'presupuestoFinal' => 3000.52,
            'gastoTotal' => 7856.2,
            'anio' => '2015/10/12',
            'codigoUnidad' => 'SP00001',
            'idCentroCostos' =>5
            ]);
        DB::table('unidad_centrocostos')->insert([
            'presupuestoFinal' => 3000.52,
            'gastoTotal' => 7856.2,
            'anio' => '2015/10/12',
            'codigoUnidad' => 'SP00002',
            'idCentroCostos' =>6
            ]);

                    
    }
}
