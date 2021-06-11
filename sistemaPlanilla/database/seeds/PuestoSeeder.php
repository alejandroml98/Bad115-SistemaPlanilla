<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('puestos')->insert([
            'codigoPuesto' => 'sc78564',
            'idRangoSalarial' => 1,
            'nombrePuesto' => 'Secretaria',
            'esAdministrativo' => 'F'
        ]);
        DB::table('puestos')->insert([
            'codigoPuesto' => 'AV45221',
            'idRangoSalarial' => 2,
            'nombrePuesto' => 'Administrador de Ventas',
            'esAdministrativo' => 'T'
        ]);

        DB::table('puestos')->insert([
            'codigoPuesto' => 'SGV7852',
            'idRangoSalarial' => 1,
            'nombrePuesto' => 'SubGenere de Ventas',
            'esAdministrativo' => 'T'
        ]);
        DB::table('puestos')->insert([
            'codigoPuesto' => 'GV85064',
            'idRangoSalarial' => 1,
            'nombrePuesto' => 'Gerente de Ventas',
            'esAdministrativo' => 'T'
        ]);
        DB::table('puestos')->insert([
            'codigoPuesto' => 'GM89570',
            'idRangoSalarial' => 2,
            'nombrePuesto' => 'Gerente de marketing',
            'esAdministrativo' => 'F'
        ]);
        DB::table('puestos')->insert([
            'codigoPuesto' => 'GF98064',
            'idRangoSalarial' => 4,
            'nombrePuesto' => 'Gerente Administrativo y Financiero',
            'esAdministrativo' => 'F'
        ]);
        DB::table('puestos')->insert([
            'codigoPuesto' => 'OG78784',
            'idRangoSalarial' => 3,
            'nombrePuesto' => 'Operador  de Garatias',
            'esAdministrativo' => 'F'
        ]);
        DB::table('puestos')->insert([
            'codigoPuesto' => 'CG93564',
            'idRangoSalarial' => 1,
            'nombrePuesto' => 'Contador General',
            'esAdministrativo' => 'F'
        ]);
        DB::table('puestos')->insert([
            'codigoPuesto' => 'AC79894',
            'idRangoSalarial' => 3,
            'nombrePuesto' => 'Auxiliar Contable',
            'esAdministrativo' => 'F'
        ]);
        DB::table('puestos')->insert([
            'codigoPuesto' => 'GF00742',
            'idRangoSalarial' => 1,
            'nombrePuesto' => 'Gerente Área de Informatica',
            'esAdministrativo' => 'F'
        ]);
        DB::table('puestos')->insert([
            'codigoPuesto' => 'AF70564',
            'idRangoSalarial' => 1,
            'nombrePuesto' => 'Asistente Informatico',
            'esAdministrativo' => 'F'
        ]);
        DB::table('puestos')->insert([
            'codigoPuesto' => 'AS07464',
            'idRangoSalarial' => 1,
            'nombrePuesto' => 'Analista de Sistemas Informáticos',
            'esAdministrativo' => 'F'
        ]);
        DB::table('puestos')->insert([
            'codigoPuesto' => 'PS70764',
            'idRangoSalarial' => 2,
            'nombrePuesto' => 'Programador Senior',
            'esAdministrativo' => 'F'
        ]);


    }
}
