<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profesions')->insert([
            'nombreProfesion' => 'Contador'
        ]);
        DB::table('profesions')->insert([
            'nombreProfesion' => 'Secretario'
        ]);
        DB::table('profesions')->insert([
            'nombreProfesion' => 'Gerente'
        ]);
        DB::table('profesions')->insert([
            'nombreProfesion' => 'Administrador'
        ]);
        DB::table('profesions')->insert([
            'nombreProfesion' => 'Analista'
        ]);
        DB::table('profesions')->insert([
            'nombreProfesion' => 'Marketing'
        ]);
    }
}
