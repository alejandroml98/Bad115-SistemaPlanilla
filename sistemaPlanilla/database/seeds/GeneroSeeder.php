<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generos')->insert([
            'nombreGenero' => 'Masculino'
        ]);
        DB::table('generos')->insert([
            'nombreGenero' => 'Femenino'
        ]);
        DB::table('generos')->insert([
            'nombreGenero' => 'Otros'
        ]);


    }
}
