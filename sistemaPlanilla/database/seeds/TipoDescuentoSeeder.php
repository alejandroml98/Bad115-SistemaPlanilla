<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDescuentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_descuentos')->insert([
            'nombreTipoDescuento' => 'Renta'
        ]);
        DB::table('tipo_descuentos')->insert([
            'nombreTipoDescuento' => 'AFP'
        ]);
        DB::table('tipo_descuentos')->insert([
            'nombreTipoDescuento' => 'Descuento por Creditos Personales'
        ]);
        DB::table('tipo_descuentos')->insert([
            'nombreTipoDescuento' => 'Ahorros'
        ]);
        DB::table('tipo_descuentos')->insert([
            'nombreTipoDescuento' => 'Cuota Alimenticia'
        ]);
    }
}
