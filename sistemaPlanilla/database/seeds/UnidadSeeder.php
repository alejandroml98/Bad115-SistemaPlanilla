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
            'nombreUnidad' => 'Departameto de Informatica',
            'idTipoUnidad' => 1,
        ]);
        DB::table('unidads')->insert([
            'codigoUnidad' => 'AR00234',
            'nombreUnidad' => 'Area de Redes',
            'idTipoUnidad' => 2,
            'codigoUnidadAntecesora' =>'DI11002'
        ]);
        DB::table('unidads')->insert([
            'codigoUnidad' => 'AS00425',
            'nombreUnidad' => 'Area de Software',
            'idTipoUnidad' => 2,
            'codigoUnidadAntecesora' =>'DI11002'
        ]);
        DB::table('unidads')->insert([
            'codigoUnidad' => 'SP00001',
            'nombreUnidad' => 'Seccion de Programacion',
            'idTipoUnidad' => 3,
            'codigoUnidadAntecesora' =>'AS00425'
        ]);
        DB::table('unidads')->insert([
            'codigoUnidad' => 'SP00002',
            'nombreUnidad' => 'Seccion de Analista',
            'idTipoUnidad' => 3,
            'codigoUnidadAntecesora' =>'AS00425'
        ]);
        
        
    }
}
