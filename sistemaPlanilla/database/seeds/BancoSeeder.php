<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bancos')->insert([
            'nombreBanco' => 'Banco Agricola'
        ]);
        DB::table('bancos')->insert([
            'nombreBanco' => 'Banco Davivienda'
        ]);
        DB::table('bancos')->insert([
            'nombreBanco' => 'Banco Promerica'
        ]);
        DB::table('bancos')->insert([
            'nombreBanco' => 'Banco Cuscatlan'
        ]);
    }
}
