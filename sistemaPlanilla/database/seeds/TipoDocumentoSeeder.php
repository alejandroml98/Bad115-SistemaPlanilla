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
            'cadenaRegex' => 'xxxxxxxxx-x'
        ]);
        DB::table('tipo_documentos')->insert([
            'nombreTipoDocumento' => 'NIT',
            'cadenaRegex' => 'xxxxxxxxxxxxx'
        ]);
        DB::table('tipo_documentos')->insert([
            'nombreTipoDocumento' => 'Pasaporte',
            'cadenaRegex' => 'xxxxxxxxxxxxx'
        ]);
        DB::table('tipo_documentos')->insert([
            'nombreTipoDocumento' => 'NUP',
            'cadenaRegex' => 'xxxxxxxxxxxxx'
        ]);
        DB::table('tipo_documentos')->insert([
            'nombreTipoDocumento' => 'ISSS',
            'cadenaRegex' => 'xxxxxxxxxxxxx'
        ]);
    }
}
