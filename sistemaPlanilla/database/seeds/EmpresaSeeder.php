<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'codigoEmpresa' => 'JA78125',
            'idDireccion' => 2,
            'nombreEmpresa' => 'Joya de Africa',
            'nit' => '8566423',
            'nic' => '1234569',
            'telefonoEmpresa' =>'45203696',
            'paginaWeb' =>'www.JoyasDeAfrica.com',
            'periodoPago' =>'t',
            'correoElectronicoEmpresa' =>'joyasdeafrica45@gmail.com',
            'salarioMinimo' => 500
            ]);


            DB::table('empresas')->insert([
                'codigoEmpresa' => 'VO98632',
                'idDireccion' => 3,
                'nombreEmpresa' => 'Viajes de Oriente',
                'nit' => '4578954',
                'nic' => '9767898',
                'telefonoEmpresa' =>'78652341',
                'paginaWeb' =>'www.ViajesdeOriente.com',
                'periodoPago' =>'t',
                'correoElectronicoEmpresa' =>'ViajesdeOriente@gmail.com',
                'salarioMinimo' => 400
                ]);
                DB::table('empresas')->insert([
                    'codigoEmpresa' => 'WH65812',
                    'idDireccion' => 1,
                    'nombreEmpresa' => 'Wehruty',
                    'nit' => '42361527',
                    'nic' => '23154231',
                    'telefonoEmpresa' =>'65421000',
                    'paginaWeb' =>'www.Wehruty.com',
                    'periodoPago' =>'t',
                    'correoElectronicoEmpresa' =>'Wehruty@gmail.com',
                    'salarioMinimo' => 300
                    ]);
                    DB::table('empresas')->insert([
                        'codigoEmpresa' => 'OR15013',
                        'idDireccion' => 4,
                        'nombreEmpresa' => 'Othepth',
                        'nit' => '75684972',
                        'nic' => '14723410',
                        'telefonoEmpresa' =>'63230111',
                        'paginaWeb' =>'www.Othepth.com',
                        'periodoPago' =>'t',
                        'correoElectronicoEmpresa' =>'Othepth@gmail.com',
                        'salarioMinimo' => 400
                        ]);
    }
}
