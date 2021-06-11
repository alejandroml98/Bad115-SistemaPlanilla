<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pais')->insert([
            'idTipoRegion' => 1,
            'nombrePais' => 'El Salvador'
        ]);
        DB::table('pais')->insert([
            'idTipoRegion' => 2,
            'nombrePais' => 'Alemania'
        ]);
        DB::table('pais')->insert([
            'idTipoRegion' => 3,
            'nombrePais' => 'EE.UU'
        ]);
        DB::table('pais')->insert([
            'idTipoRegion' => 4,
            'nombrePais' => 'Francia'
        ]);
        DB::table('pais')->insert([
            'idTipoRegion' => 5,
            'nombrePais' => 'Rusia'
        ]);
        DB::table('pais')->insert([
            'idTipoRegion' => 1,
            'nombrePais' => 'Japon'
        ]);
    }
}
