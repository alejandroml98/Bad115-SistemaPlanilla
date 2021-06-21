<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_regions')->insert([
            'idRegion' => 1,
            'nombreSubRegion' => 'San Salvador'
        ]);
        DB::table('sub_regions')->insert([
            'idRegion' => 1,
            'nombreSubRegion' => 'Delgado'
        ]);
        DB::table('sub_regions')->insert([
            'idRegion' => 1,
            'nombreSubRegion' => 'Soyapango'
        ]);
        DB::table('sub_regions')->insert([
            'idRegion' => 1,
            'nombreSubRegion' => 'Mexicanos'
        ]);
        DB::table('sub_regions')->insert([
            'idRegion' => 1,
            'nombreSubRegion' => 'San Martin'
        ]);
        DB::table('sub_regions')->insert([
            'idRegion' => 1,
            'nombreSubRegion' => 'Apopa'
        ]);
    }
}
