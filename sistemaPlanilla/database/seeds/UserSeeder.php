<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ernesto',
            'email' => 'ernesto@gmail.com',
            'password' => 'ernesto1',
            'activo' => 'T'
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'Admin123',
            'activo' => 'T'
        ]);
        DB::table('users')->insert([
            'name' => 'josue',
            'email' => 'josue@gmail.com',
            'password' => 'josue123',
            'activo' => 'T'
        ]);
        DB::table('users')->insert([
            'name' => 'juan',
            'email' => 'juan@gmail.com',
            'password' => 'juan1234',
            'activo' => 'T'
        ]);
        DB::table('users')->insert([
            'name' => 'pedro',
            'email' => 'pedro@gmail.com',
            'password' => 'pedro123',
            'activo' => 'T'
        ]);
        DB::table('users')->insert([
            'name' => 'maria',
            'email' => 'maria@gmail.com',
            'password' => 'maria123',
            'activo' => 'T'
        ]);
        DB::table('users')->insert([
            'name' => 'Karla',
            'email' => 'karla@gmail.com',
            'password' => 'aleman78',
            'activo' => 'T'
        ]);

        DB::table('users')->insert([
            'name' => 'hugo',
            'email' => 'hugo@gmail.com',
            'password' => 'hugodi10',
            'activo' => 'T'
        ]);
        DB::table('users')->insert([
            'name' => 'Daniel',
            'email' => 'daniel234@gmail.com',
            'password' => 'daniel45',
            'activo' => 'T'
        ]);
        DB::table('users')->insert([
            'name' => 'Lucas',
            'email' => 'lucas4Ortiz@gmail.com',
            'password' => 'Ortiz11As',
            'activo' => 'T'
        ]);
        DB::table('users')->insert([
            'name' => 'Adrian',
            'email' => 'Adrian7Cortez@gmail.com',
            'password' => 'Hernan34Ui',
            'activo' => 'T'
        ]);
        DB::table('users')->insert([
            'name' => 'Martin',
            'email' => 'Martin12Cortez@gmail.com',
            'password' => 'maRtin34Ui',
            'activo' => 'T'
        ]);
        DB::table('users')->insert([
            'name' => 'Francisco',
            'email' => 'Francisco1Javier@gmail.com',
            'password' => 'Francisco34',
            'activo' => 'T'
        ]);
        DB::table('users')->insert([
            'name' => 'Diego',
            'email' => 'Diego1Arce@gmail.com',
            'password' => 'DiegoAe34',
            'activo' => 'T'
        ]);
        DB::table('users')->insert([
            'name' => 'JoseLuis',
            'email' => 'Joseluis@gmail.com',
            'password' => 'Josueluis34',
            'activo' => 'T'
        ]);
    }
}
