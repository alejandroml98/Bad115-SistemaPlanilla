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
            'nombreTipoUnidad' => 'Area',
            'idTipoUnidadPadre' => 1
        ]);
        DB::table('tipo_unidads')->insert([
            'nombreTipoUnidad' => 'Seccion',
            'idTipoUnidadPadre' => 2
        ]);
        DB::table('tipo_unidads')->insert([
            'nombreTipoUnidad' => 'SubSeccion',
            'idTipoUnidadPadre' => 3
        ]);

    }
}
