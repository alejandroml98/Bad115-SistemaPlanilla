<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'ER45201',
            'primerNombre' => 'Ernesto',
            'segundoNombre' => 'Carlos',
            'apellidoPaterno' => 'Hernandez',
            'apellidoMaterno' => 'Gonzalez',
            'apellidoCasado' => '',
            'fechaNacimiento' => '1988/05/10',
            'idUser' => 1,
            'idGenero' => 1,
            'idDireccion' => 1,
            'idEstadoCivil' => 1,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'SC78564',
            'salario' => 500.52,
            'correoElectronico' => 'ernesto@gmail.com',
            'correoEmpresarial' => 'ernestoEmpleado@gmail.com'
        ]);
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'ADMIN12',
            'primerNombre' => 'Admin',
            'segundoNombre' => 'Admin',
            'apellidoPaterno' => 'Admin',
            'apellidoMaterno' => 'Admin',
            'apellidoCasado' => '',
            'fechaNacimiento' => '1989/04/21',
            'idUser' => 2,
            'idGenero' => 1,
            'idDireccion' => 2,
            'idEstadoCivil' => 2,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'AV45221',
            'salario' => 800.52,
            'correoElectronico' => 'admin@gmail.com',
            'correoEmpresarial' => 'adminEmpleado@gmail.com'
        ]);
        
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'JU12374',
            'primerNombre' => 'Josue',
            'segundoNombre' => 'Adolfo',
            'apellidoPaterno' => 'Avelar',
            'apellidoMaterno' => 'Ortiz',
            'apellidoCasado' => '',
            'fechaNacimiento' => '1995/01/11',
            'idUser' => 3,
            'idGenero' => 1,
            'idDireccion' => 3,
            'idEstadoCivil' => 1,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'SGV7852',
            'salario' => 300.52,
            'correoElectronico' => 'josue12@gmail.com',
            'correoEmpresarial' => 'josueempleado@gmail.com'
        ]);
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'JN85234',
            'primerNombre' => 'Juan',
            'segundoNombre' => 'Carlos',
            'apellidoPaterno' => 'Abrego',
            'apellidoMaterno' => 'Gomez',
            'apellidoCasado' => '',
            'fechaNacimiento' => '1985/10/10',
            'idUser' => 4,
            'idGenero' => 1,
            'idDireccion' => 4,
            'idEstadoCivil' => 1,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'GV85064',
            'salario' => 500.52,
            'correoElectronico' => 'juanCarlos@gmail.com',
            'correoEmpresarial' => 'JN85234Empleado@gmail.com'
        ]);
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'PG78523',
            'primerNombre' => 'Pedro',
            'segundoNombre' => 'Ernandez',
            'apellidoPaterno' => 'Castillo',
            'apellidoMaterno' => 'Castro',
            'apellidoCasado' => '',
            'fechaNacimiento' => '2000/12/10',
            'idUser' => 5,
            'idGenero' => 1,
            'idDireccion' => 5,
            'idEstadoCivil' => 1,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'GM89570',
            'salario' => 542.89,
            'correoElectronico' => 'PedroCastillo@gmail.com',
            'correoEmpresarial' => 'CastroCastilloEmpleado@gmail.com'
        ]);
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'MA78951',
            'primerNombre' => 'Maria',
            'segundoNombre' => 'Alejandra',
            'apellidoPaterno' => '',
            'apellidoMaterno' => 'Gonzalez',
            'apellidoCasado' => 'De los angeles',
            'fechaNacimiento' => '2000/05/10',
            'idUser' => 6,
            'idGenero' => 1,
            'idDireccion' => 6,
            'idEstadoCivil' => 1,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'GF98064',
            'salario' => 900.52,
            'correoElectronico' => 'Angeles7Cruz@gmail.com',
            'correoEmpresarial' => 'mariaEmpleado@gmail.com'
        ]);
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'KA78951',
            'primerNombre' => 'Karla',
            'segundoNombre' => 'Montez',
            'apellidoPaterno' => 'Aleman',
            'apellidoMaterno' => 'Avila',
            'apellidoCasado' => '',
            'fechaNacimiento' => '2007/05/10',
            'idUser' => 7,
            'idGenero' => 1,
            'idDireccion' => 7,
            'idEstadoCivil' => 1,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'OG78784',
            'salario' => 1500.52,
            'correoElectronico' => 'Karla7Cruz@gmail.com',
            'correoEmpresarial' => 'karlaEmpleado@gmail.com'
        ]);
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'HU32758',
            'primerNombre' => 'Hugo',
            'segundoNombre' => 'Estiben',
            'apellidoPaterno' => 'Mendoza',
            'apellidoMaterno' => 'Buston',
            'apellidoCasado' => '',
            'fechaNacimiento' => '2004/08/01',
            'idUser' => 8,
            'idGenero' => 1,
            'idDireccion' => 8,
            'idEstadoCivil' => 1,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'CG93564',
            'salario' => 400.52,
            'correoElectronico' => 'hugoGo7Cruz@gmail.com',
            'correoEmpresarial' => 'HugoEmpleado@gmail.com'
        ]);
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'DN75315',
            'primerNombre' => 'Daniel',
            'segundoNombre' => 'Marroquin',
            'apellidoPaterno' => 'Diaz',
            'apellidoMaterno' => 'Mejia',
            'apellidoCasado' => '',
            'fechaNacimiento' => '1994/03/08',
            'idUser' => 9,
            'idGenero' => 1,
            'idDireccion' => 9,
            'idEstadoCivil' => 1,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'AC79894',
            'salario' => 400.52,
            'correoElectronico' => 'Marrronquin7Cruz@gmail.com',
            'correoEmpresarial' => 'DanielEmpleado@gmail.com'
        ]);
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'LC64820',
            'primerNombre' => 'Luca',
            'segundoNombre' => 'Marroquin',
            'apellidoPaterno' => 'Garcia',
            'apellidoMaterno' => 'Mora',
            'apellidoCasado' => '',
            'fechaNacimiento' => '1998/08/05',
            'idUser' => 10,
            'idGenero' => 1,
            'idDireccion' => 10,
            'idEstadoCivil' => 1,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'GF00742',
            'salario' => 522.26,
            'correoElectronico' => 'Luca@gmail.com',
            'correoEmpresarial' => 'lucaEmpleado@gmail.com'
        ]);
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'AR93146',
            'primerNombre' => 'Adrian',
            'segundoNombre' => 'Rafael',
            'apellidoPaterno' => 'Urie',
            'apellidoMaterno' => 'Antina',
            'apellidoCasado' => '',
            'fechaNacimiento' => '1999/01/30',
            'idUser' => 11,
            'idGenero' => 1,
            'idDireccion' => 11,
            'idEstadoCivil' => 1,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'AF70564',
            'salario' => 472.88,
            'correoElectronico' => 'Adrian@gmail.com',
            'correoEmpresarial' => 'AdrianEmpleado@gmail.com'
        ]);
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'MT78430',
            'primerNombre' => 'Martin',
            'segundoNombre' => 'Andres',
            'apellidoPaterno' => 'Alvarez',
            'apellidoMaterno' => 'Mendez',
            'apellidoCasado' => '',
            'fechaNacimiento' => '1999/02/5',
            'idUser' => 12,
            'idGenero' => 1,
            'idDireccion' => 12,
            'idEstadoCivil' => 1,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'AS07464',
            'salario' => 527.88,
            'correoElectronico' => 'Martin@gmail.com',
            'correoEmpresarial' => 'MartinEmpleado@gmail.com'
        ]);
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'FR78562',
            'primerNombre' => 'Francisco',
            'segundoNombre' => 'Ricardo',
            'apellidoPaterno' => 'Ochoa',
            'apellidoMaterno' => 'Ulloa',
            'apellidoCasado' => '',
            'fechaNacimiento' => '1999/11/15',
            'idUser' => 13,
            'idGenero' => 1,
            'idDireccion' => 13,
            'idEstadoCivil' => 1,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'PS70764',
            'salario' => 785.88,
            'correoElectronico' => 'Francisco@gmail.com',
            'correoEmpresarial' => 'FranciscoEmpleado@gmail.com'
        ]);
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'DG86421',
            'primerNombre' => 'Diego',
            'segundoNombre' => 'Ricardo',
            'apellidoPaterno' => 'Santos',
            'apellidoMaterno' => 'Amaya',
            'apellidoCasado' => '',
            'fechaNacimiento' => '1999/12/15',
            'idUser' => 14,
            'idGenero' => 1,
            'idDireccion' => 14,
            'idEstadoCivil' => 1,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'RH11502',
            'salario' => 637.88,
            'correoElectronico' => 'diego@gmail.com',
            'correoEmpresarial' => 'diegocoEmpleado@gmail.com'
        ]);
        DB::table('empleados')->insert([
            'codigoEmpleado' => 'JL35624',
            'primerNombre' => 'Jose',
            'segundoNombre' => 'Luis',
            'apellidoPaterno' => 'Arce',
            'apellidoMaterno' => 'Lopez',
            'apellidoCasado' => '',
            'fechaNacimiento' => '1999/10/25',
            'idUser' => 15,
            'idGenero' => 1,
            'idDireccion' => 15,
            'idEstadoCivil' => 1,
            'codigoEmpresa' => 'JA78125',
            'codigoPuesto'=> 'IN38592',
            'salario' => 865.72,
            'correoElectronico' => 'joseluis@gmail.com',
            'correoEmpresarial' => 'luisEmpleado@gmail.com'
        ]);
        
        
    }
}
