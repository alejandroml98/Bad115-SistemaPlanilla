<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_documentos')->insert([
            'nombreTipoDocumento' => 'DUI',
            'cadenaRegex' => '/^[0-9]{8}-[0-9]{1}$/'
        ]);
        DB::table('tipo_documentos')->insert([
            'nombreTipoDocumento' => 'NIT',
            'cadenaRegex' => '/^[0-9]{4}-[0-9]{6}[0-9]{3}-[0-9]{1}$/'
        ]);
        DB::table('tipo_documentos')->insert([
            'nombreTipoDocumento' => 'Pasaporte',
            'cadenaRegex' => '/^[0-9]{9}$/'
        ]);
        DB::table('tipo_documentos')->insert([
            'nombreTipoDocumento' => 'NUP',
            'cadenaRegex' => '/^[0-9]{9}$/'
        ]);
        DB::table('tipo_documentos')->insert([
            'nombreTipoDocumento' => 'ISSS',
            'cadenaRegex' => '/^[0-9]{9}$/'
        ]);
    }
}
