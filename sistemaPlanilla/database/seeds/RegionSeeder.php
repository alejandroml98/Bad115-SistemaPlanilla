<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'Ahuachapán'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'Cabañas'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'Chalatenango'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'Cuscatlán'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'La Libertad'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'La Paz'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'La Unión'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'Morazán'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'San Miguel'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'San Salvador'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'San Vicente'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'Santa Ana'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'Sonsonate'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'Usulután'
        ]);

        DB::table('regions')->insert([
            'idPais' => 2,
            'nombreRegion' => 'Shleswig-Holstein'
        ]);
        DB::table('regions')->insert([
            'idPais' => 2,
            'nombreRegion' => 'Sajonia'
        ]);

        DB::table('regions')->insert([
            'idPais' => 3,
            'nombreRegion' => 'Nueva York'
        ]);
        DB::table('regions')->insert([
            'idPais' => 3,
            'nombreRegion' => 'California '
        ]);
       
        DB::table('regions')->insert([
            'idPais' => 4,
            'nombreRegion' => 'Alta Francia'
        ]);
        DB::table('regions')->insert([
            'idPais' => 4,
            'nombreRegion' => 'Normandia'
        ]);
        DB::table('regions')->insert([
            'idPais' => 5,
            'nombreRegion' => 'República de Adigueya'
        ]);
        DB::table('regions')->insert([
            'idPais' => 5,
            'nombreRegion' => 'República de Buriatia'
        ]);
        DB::table('regions')->insert([
            'idPais' => 6,
            'nombreRegion' => 'Osaka'
        ]);
        DB::table('regions')->insert([
            'idPais' => 6,
            'nombreRegion' => 'Tokio'
        ]);
    }
}

