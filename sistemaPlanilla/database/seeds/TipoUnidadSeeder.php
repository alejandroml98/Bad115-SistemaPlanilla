<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_unidads')->insert([
            'nombreTipoUnidad' => 'Departamento',
        ]);
        DB::table('tipo_unidads')->insert([
            'nombreTipoUnidad' => 'Área',
            'idTipoUnidadPadre' => 1
        ]);
        DB::table('tipo_unidads')->insert([
            'nombreTipoUnidad' => 'Sección',
            'idTipoUnidadPadre' => 2
        ]);
        DB::table('tipo_unidads')->insert([
            'nombreTipoUnidad' => 'SubSección',
            'idTipoUnidadPadre' => 3
        ]);

    }
}
