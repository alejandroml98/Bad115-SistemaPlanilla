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
            'nombreRegion' => 'San Salvador'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'Ahuachapan'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'Santa Ana'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'Chalatenango'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'La Libertad'
        ]);
        DB::table('regions')->insert([
            'idPais' => 1,
            'nombreRegion' => 'San Vicente'
        ]);
    }
}
