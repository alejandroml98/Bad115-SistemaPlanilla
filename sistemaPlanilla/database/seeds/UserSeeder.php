<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'email_verified_at' => now(),
            'password' => Hash::make('ernesto1'),
            'activo' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin123'),
            'activo' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'josue',
            'email' => 'josue@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('josue123'),
            'activo' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'juan',
            'email' => 'juan@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('juan1234'),
            'activo' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'pedro',
            'email' => 'pedro@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pedro123'),
            'activo' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'maria',
            'email' => 'maria@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('maria123'),
            'activo' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'Karla',
            'email' => 'karla@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('aleman78'),
            'activo' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'hugo',
            'email' => 'hugo@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('hugodi10'),
            'activo' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'Daniel',
            'email' => 'daniel234@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('daniel45'),
            'activo' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'Lucas',
            'email' => 'lucas4Ortiz@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Ortiz11As'),
            'activo' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'Adrian',
            'email' => 'Adrian7Cortez@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Hernan34Ui'),
            'activo' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'Martin',
            'email' => 'Martin12Cortez@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('maRtin34Ui'),
            'activo' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'Francisco',
            'email' => 'Francisco1Javier@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Francisco34'),
            'activo' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'Diego',
            'email' => 'Diego1Arce@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('DiegoAe34'),
            'activo' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'JoseLuis',
            'email' => 'Joseluis@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Josueluis34'),
            'activo' => '1'
        ]);
    }
}
