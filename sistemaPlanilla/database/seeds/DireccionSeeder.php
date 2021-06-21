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
            'idSubRegion' => 3,
            'detalleDireccion' => 'Calle aguilares Pasaje B Casa 4'
        ]);
        DB::table('direccions')->insert([
            'idSubRegion' => 4,
            'detalleDireccion' => 'Calle Cortez Block B 1-3'
        ]);
        DB::table('direccions')->insert([
            'idSubRegion' => 5,
            'detalleDireccion' => 'Col Lincoln Cl Castro Morán 7 - 1'
        ]);
        DB::table('direccions')->insert([
            'idSubRegion' => 6,
            'detalleDireccion' => '6ta. Calle Poniente # 310 y 5ta Ave. Norte,'
        ]);
        DB::table('direccions')->insert([
            'idSubRegion' => 7,
            'detalleDireccion' => 'Colonia El Refugio'
        ]);
        DB::table('direccions')->insert([
            'idSubRegion' => 8,
            'detalleDireccion' => 'Avenida Independencia y Alameda Juan Pablo II, No. 437'
        ]);
        DB::table('direccions')->insert([
            'idSubRegion' => 9,
            'detalleDireccion' => '1ª Calle Poniente entre 60ª Avenida Norte y Boulevard Constitución No. 3549'
        ]);
        DB::table('direccions')->insert([
            'idSubRegion' => 10,
            'detalleDireccion' => 'Colonia Buenos Aires 3, Diagonal Centroamérica, Avenida Alvarado'
        ]);DB::table('direccions')->insert([
            'idSubRegion' => 11,
            'detalleDireccion' => 'Avenida Monseñor Romero y Final Calle 5 de Noviembre'
        ]);
        DB::table('direccions')->insert([
            'idSubRegion' => 12,
            'detalleDireccion' => 'Blvd Del Ejérc Nac Urb Altos Del Boulevard'
        ]);
        DB::table('direccions')->insert([
            'idSubRegion' => 13,
            'detalleDireccion' => 'Calle Gerardo Barrios, 17 AV. Sur #412'
        ]);
        DB::table('direccions')->insert([
            'idSubRegion' => 14,
            'detalleDireccion' => 'Alam Roosevelt 37 Av S 114'
        ]);
        DB::table('direccions')->insert([
            'idSubRegion' => 15,
            'detalleDireccion' => 'C29 Cl Pte y 11 Av Nte Bo '
        ]);
    }
}
