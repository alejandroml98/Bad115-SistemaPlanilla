<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidads')->insert([
            'codigoUnidad' => 'RH78523',
            'nombreUnidad' => 'Recursos Humanos',
            'idTipoUnidad' => 1
            ]);

        DB::table('unidads')->insert([
            'codigoUnidad' => 'DI11002',
            'nombreUnidad' => 'Departamento de Informatica',
            'idTipoUnidad' => 1,
        ]);
        DB::table('unidads')->insert([
            'codigoUnidad' => 'AR00234',
            'nombreUnidad' => 'Área de Redes',
            'idTipoUnidad' => 2,
            'codigoUnidadAntecesora' =>'DI11002'
        ]);
        DB::table('unidads')->insert([
            'codigoUnidad' => 'AS00425',
            'nombreUnidad' => 'Área de Software',
            'idTipoUnidad' => 2,
            'codigoUnidadAntecesora' =>'DI11002'
        ]);
        DB::table('unidads')->insert([
            'codigoUnidad' => 'SP00001',
            'nombreUnidad' => 'Sección de Programación',
            'idTipoUnidad' => 3,
            'codigoUnidadAntecesora' =>'AS00425'
        ]);
        DB::table('unidads')->insert([
            'codigoUnidad' => 'SP00002',
            'nombreUnidad' => 'Sección de Analista',
            'idTipoUnidad' => 3,
            'codigoUnidadAntecesora' =>'AS00425'
        ]);
        
        
    }
}
