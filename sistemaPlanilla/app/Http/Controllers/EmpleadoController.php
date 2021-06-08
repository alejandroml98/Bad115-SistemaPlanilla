<?php

namespace App\Http\Controllers;

use App\Banco;
use App\CuentaBancaria;
use App\Direccion;
use App\Empleado;
use App\Empresa;
use App\EstadoCivil;
use App\Genero;
use App\Pais;
use App\Puesto;
use App\Region;
use App\SubRegion;
use App\TipoDocumento;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all();
        $puestos = Puesto::all();
        return view('empleado.index', compact('empleados', 'puestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direcciones = Direccion::all();
        $paises = Pais::all();
        $regiones = Region::all();
        $subRegiones = SubRegion::all();
        $generos = Genero::all();
        $estadosCiviles = EstadoCivil::all();
        $puestos = Puesto::all();
        $empresas = Empresa::all();
        $usuarios = User::all();
        return view('empleado.create', compact('direcciones', 'paises', 'regiones', 
        'subRegiones', 'generos', 'estadosCiviles', 'puestos', 'empresas', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'codigoEmpleado' => ['required','string', 'regex:/[a-zA-Z]{2}[0-9]{5}$/', 'unique:empleados'],
            'primerNombre' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
            'segundoNombre' => ['string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
            'apellidoPaterno' => ['max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
            'apellidoMaterno' => ['max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],            
            'fechaNacimiento' => ['date', 'required'],
            'idDireccion' => ['int', 'required'],
            'idGenero' => ['int', 'required'],
            'idEstadoCivil' => ['int', 'required'],
            'codigoPuesto' => ['string', 'required', 'regex:/[a-zA-Z]{2}[0-9]{5}$/'],
            'codigoEmpresa' => ['string', 'required', 'regex:/[a-zA-Z]{2}[0-9]{5}$/'],
            'salario' => ['min:0', 'max:999999', 'numeric'],
            'correoElectronico' => ['required', 'string', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'correoEmpresarial' => ['required', 'string', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'idUser' => ['required', 'int']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $empleado = request()->except('_token');
        Empleado::insert($empleado);
        return redirect('empleado')->with('mensaje', 'Empleado Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $direcciones = Direccion::all();
        $paises = Pais::all();
        $regiones = Region::all();
        $subRegiones = SubRegion::all();
        $generos = Genero::all();
        $estadosCiviles = EstadoCivil::all();
        $puestos = Puesto::all();
        $empresas = Empresa::all();
        $usuarios = User::all();
        //Para Cuenta Bancaria
        $cuentasBancarias = DB::table('cuenta_bancarias')->where('codigoempleado','=',$id)->get();
        $bancos = Banco::all();
        //Para Documentos
        $tiposDocumentosEmpleados = DB::table('tipodocumento_empleados')->where('codigoempleado','=',$id)->get();
        $tiposDocumentos = TipoDocumento::all();
        return view('empleado.edit', compact('direcciones', 'paises', 'regiones', 
        'subRegiones', 'generos', 'estadosCiviles', 'puestos', 'empresas', 'usuarios', 'empleado',
        'cuentasBancarias', 'bancos', 'tiposDocumentosEmpleados', 'tiposDocumentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $campos = [
            'codigoEmpleado' => ['required','string', 'regex:/[a-zA-Z]{2}[0-9]{5}$/'],
            'primerNombre' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
            'segundoNombre' => ['string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
            'apellidoPaterno' => ['max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
            'apellidoMaterno' => ['max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],            
            'fechaNacimiento' => ['date', 'required'],
            'idDireccion' => ['int', 'required'],
            'idGenero' => ['int', 'required'],
            'idEstadoCivil' => ['int', 'required'],
            'codigoPuesto' => ['string', 'required', 'regex:/[a-zA-Z]{2}[0-9]{5}$/'],
            'codigoEmpresa' => ['string', 'required', 'regex:/[a-zA-Z]{2}[0-9]{5}$/'],
            'salario' => ['min:0', 'max:999999', 'numeric'],
            'correoElectronico' => ['required', 'string', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'correoEmpresarial' => ['required', 'string', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'idUser' => ['required', 'int']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);                
        $empleado = request()->except('_token','_method', 'codigoEmpleadoAnterior');
        try {
            Empleado::where('codigoempleado', '=', $request -> codigoEmpleadoAnterior)->update($empleado);
            return redirect('empleado')->with('mensaje', 'Empleado Modificado');
        } catch(QueryException $e) {            
            return redirect('empleado')->with('mensaje', 'Código Empleado ya existente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleado::where('codigoempleado', '=', $id)->delete();
        return redirect('empleado')->with('mensaje', 'Empleado Eliminado');
    }

    public function activar(User $user)
    {
        $user->activo=true;
        $user->save();
        $data = array('name'=>$user->name);
        //Para enviar correo de confirmacion de nuevo
        Mail::send('Mail.activar', $data, function ($message) use ($data){
            $message->to($user->email, $user->name);
            $message->subject('Activación de su cuenta');            
        });        
    }

    public function desactivar(User $user)
    {
        $user->activo=false;
        $user->save();        
        $data = array('name'=>$user->name, 'explicacion'=>$explicacion);
        //Para enviar correo de confirmacion de nuevo
        Mail::send('Mail.desactivar', $data, function ($message) use ($data){
            $message->to($user->email, $user->name);
            $message->subject('Desactivación de su cuenta');            
        });        
        dd($user->name);
    }

    public function pedirActivacion(Request $request)
    {
        $user= Auth::User();
        //Solicitar proceso de activacion por correo
        $data = array('name'=>$user->name, 'explicacion'=>$explicacion);
        //Para enviar correo de confirmacion de nuevo
        Mail::send('Mail.pediractivacion', $data, function ($message) use ($data){
            $message->to("admin@gmail.com", "Admin");
            $message->subject('Proceso de reactivación de cuenta');            
        });
        dd($user);
    }

    public function inactivo()
    {
        return view('auth.active');
    }
}
