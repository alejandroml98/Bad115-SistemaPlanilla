<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_regions')->insert([
            'nombreTipoRegion' => 'Departamento',
            'nombreTipoSubRegion' => 'Municipio'
        ]);
        DB::table('tipo_regions')->insert([
            'nombreTipoRegion' => 'Estado',
            'nombreTipoSubRegion' => 'Condado'
        ]);
        DB::table('tipo_regions')->insert([
            'nombreTipoRegion' => 'Región Administrativa',
            'nombreTipoSubRegion' => 'Distritos'
        ]);
        DB::table('tipo_regions')->insert([
            'nombreTipoRegion' => 'Federaciones',
            'nombreTipoSubRegion' => 'Regiones'
        ]);
        DB::table('tipo_regions')->insert([
            'nombreTipoRegion' => 'Prefecta',
            'nombreTipoSubRegion' => 'Provincias'
        ]);
    }
}
