<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DireccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('direccions')->insert([
            'idSubRegion' => 1,
            'detalleDireccion' => 'Calle Satelite Poligono A Casa 75'
        ]);
        DB::table('direccions')->insert([
            'idSubRegion' => 2,
            'detalleDireccion' => 'Calle San Pablo Pasaje C Casa 3'
        ]);
        DB::table('direccions')->insert([
            'idSubRegion' => 1,
            'detalleDireccion' => 'Calle aguilares Pasaje A Casa 4'
        ]);
        DB::table('direccions')->insert([
            'idSubRegion' => 3,
            'detalleDireccion' => 'Calle Cortez Casa 75'
        ]);
    }
}
