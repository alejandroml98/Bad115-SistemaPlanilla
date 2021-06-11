<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogoComisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catalogo_comisions')->insert([
            'nombreComision' => 'Dividendos en Efecivo',
            'porcentaje' => 0.10,
            'valMinComision' => 300,
            'valMaxComision' => 600
        ]);
        DB::table('catalogo_comisions')->insert([
            'nombreComision' => 'Rentas Pendientes',
            'porcentaje' => 0.20,
            'valMinComision' => 50,
            'valMaxComision' => 800
        ]);
        DB::table('catalogo_comisions')->insert([
            'nombreComision' => 'Ventas al por mayor',
            'porcentaje' => 0.25,
            'valMinComision' => 30,
            'valMaxComision' => 400
        ]);
        DB::table('catalogo_comisions')->insert([
            'nombreComision' => 'Meta superada',
            'porcentaje' => 0.15,
            'valMinComision' => 50,
            'valMaxComision' => 200
        ]);
        DB::table('catalogo_comisions')->insert([
            'nombreComision' => 'Horas extras',
            'porcentaje' => 0.15,
            'valMinComision' => 50,
            'valMaxComision' => 200
        ]);
    }
}
