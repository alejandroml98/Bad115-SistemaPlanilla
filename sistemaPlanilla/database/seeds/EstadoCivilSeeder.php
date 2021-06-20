<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_civils')->insert([
            'nombreEstadoCivil' => 'Soltero'
        ]);
        DB::table('estado_civils')->insert([
            'nombreEstadoCivil' => 'Casado'
        ]);
        DB::table('estado_civils')->insert([
            'nombreEstadoCivil' => 'Divorciado'
        ]);
        DB::table('estado_civils')->insert([
            'nombreEstadoCivil' => 'Viudo'
        ]);
    }
}
