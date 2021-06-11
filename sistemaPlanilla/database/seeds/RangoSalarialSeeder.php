<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RangoSalarialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rango_salarials')->insert([
            'salarioMinimo' => 450,
            'salarioMaximo' => 650
        ]);
        DB::table('rango_salarials')->insert([
            'salarioMinimo' => 600,
            'salarioMaximo' => 800
        ]);
        DB::table('rango_salarials')->insert([
            'salarioMinimo' => 900,
            'salarioMaximo' => 1500
        ]);
        DB::table('rango_salarials')->insert([
            'salarioMinimo' => 1600,
            'salarioMaximo' => 2500
        ]);
        DB::table('rango_salarials')->insert([
            'salarioMinimo' => 2500,
            'salarioMaximo' => 3000
        ]);
    }
}
