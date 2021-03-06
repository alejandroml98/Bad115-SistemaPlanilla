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
use App\Profesion;
use App\Puesto;
use App\RangoSalarial;
use App\Region;
use App\SubRegion;
use App\TipoDescuento;
use App\TipoDocumento;
use App\TipoIngreso;
use App\Unidad;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

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
        $usuariosTabla = User::all();
        $empleado = Empleado::all();
        $usuariosAsignados = array();
        foreach($empleado as $emp){
            foreach($usuariosTabla as $u){
                if($u -> id == $emp -> iduser){
                    array_push($usuariosAsignados, $u);
                }
            }
        }
        $usuarios = $usuariosTabla -> diff($usuariosAsignados);        
        return view('empleado.create', compact('direcciones', 'paises', 'regiones', 
        'subRegiones', 'generos', 'estadosCiviles', 'puestos', 'empresas', 'usuarios'));
    }

    public function create2($user)
    {
        $direcciones = Direccion::all();
        $paises = Pais::all();
        $regiones = Region::all();
        $subRegiones = SubRegion::all();
        $generos = Genero::all();
        $estadosCiviles = EstadoCivil::all();
        $puestos = Puesto::all();        
        $empresas = Empresa::all();        
        $usuarios = User::where('id',$user)->get();
                
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
            'primerNombre' => ['required','string', 'max:100', 'regex:/^[a-zA-Z??-????-?? ]*$/'],
            'segundoNombre' => ['string', 'max:100', 'regex:/^[a-zA-Z??-????-?? ]*$/'],
            'apellidoPaterno' => ['max:100', 'regex:/^[a-zA-Z??-????-?? ]*$/'],
            'apellidoMaterno' => ['max:100', 'regex:/^[a-zA-Z??-????-?? ]*$/'],            
            'fechaNacimiento' => ['date', 'required'],
            'idDireccion' => ['int', 'required'],
            'idGenero' => ['int', 'required'],
            'idEstadoCivil' => ['int', 'required'],
            'codigoPuesto' => ['string', 'required', 'regex:/[a-zA-Z]{2}[0-9]{5}$/'],
            'codigoEmpresa' => ['string', 'required', 'regex:/[a-zA-Z]{2}[0-9]{5}$/'],
            'salario' => ['min:0', 'max:999999', 'numeric'],
            //'correoElectronico' => ['required', 'string', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'correoEmpresarial' => ['required', 'string', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'idUser' => ['required', 'int']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta n??meros o caracteres especiales',
            "unique" => 'El :attribute que escribi?? ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        //Validando que el salario corresponde al rango salarial
        $codigoEmpleado = $request->input('codigoEmpleado');
        $puesto = Puesto::where('codigopuesto','=', $request['codigoPuesto'])->first();
        $rangoSalarial = RangoSalarial::where('idrangosalarial','=',$puesto -> idrangosalarial)->first();
        if($request['salario'] >= $rangoSalarial -> salariominimo && $request['salario'] <= $rangoSalarial -> salariomaximo){            
            $empleado = request()->except('_token');             
            //dd($empleado["correoElectronico"]);
            $user = User::find($empleado["idUser"]);
            $user->name = $empleado["primerNombre"] . " " .$empleado["apellidoPaterno"];
            //dd($user);  
            $empleado["correoElectronico"]=$user->email;
            //dd($empleado);  
            Empleado::insert($empleado);                        
            $user->save();
            return redirect('empleado/'.$codigoEmpleado.'/edit')->with('mensaje', 'Empleado Creado');
        } else {
            return redirect()->action('EmpleadoController@create')->with('mensaje', 'El salario no est?? en el rango correspondiente del puesto $'.$rangoSalarial -> salariominimo.' - $'.$rangoSalarial -> salariomaximo);
        }        
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
        //Para Descuentos
        $tiposDescuentosEmpleados = DB::table('tipodescuento_empleados')->where('codigoempleado','=',$id)->get();
        $tiposDescuentos = TipoDescuento::all();
        //Para Ingresos
        $tiposIngresosEmpleados = DB::table('tipoingresos_empleados')->where('codigoempleado','=',$id)->get();
        $tiposIngresos = TipoIngreso::all();
        //Para Profesiones
        $profesionesEmpleados = DB::table('profesion_empleados')->where('codigoempleado','=',$id)->get();
        $profesiones = Profesion::all();
        //Para Unidades
        $unidadesEmpleados = DB::table('unidad_empleados')->where('codigoempleado','=',$id)->get();
        $unidades = Unidad::all();
        return view('empleado.edit', compact('direcciones', 'paises', 'regiones', 
        'subRegiones', 'generos', 'estadosCiviles', 'puestos', 'empresas', 'usuarios', 'empleado',
        'cuentasBancarias', 'bancos', 'tiposDocumentosEmpleados', 'tiposDocumentos', 'tiposDescuentosEmpleados', 'tiposDescuentos',
        'tiposIngresosEmpleados', 'tiposIngresos', 'profesionesEmpleados', 'profesiones', 'unidadesEmpleados', 'unidades'));
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
            'primerNombre' => ['required','string', 'max:100', 'regex:/^[a-zA-Z??-????-?? ]*$/'],
            'segundoNombre' => ['string', 'max:100', 'regex:/^[a-zA-Z??-????-?? ]*$/'],
            'apellidoPaterno' => ['max:100', 'regex:/^[a-zA-Z??-????-?? ]*$/'],
            'apellidoMaterno' => ['max:100', 'regex:/^[a-zA-Z??-????-?? ]*$/'],            
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
            "regex" => 'El :attribute no acepta n??meros o caracteres especiales',
            "unique" => 'El :attribute que escribi?? ya existe'
        ];
        $this->validate($request, $campos, $mensaje); 
        //Validando que el salario corresponde al rango salarial
        $puesto = Puesto::where('codigopuesto','=', $request['codigoPuesto'])->first();
        $rangoSalarial = RangoSalarial::where('idrangosalarial','=',$puesto -> idrangosalarial)->first();
        if($request['salario'] >= $rangoSalarial -> salariominimo && $request['salario'] <= $rangoSalarial -> salariomaximo){
            $empleado = request()->except('_token','_method', 'codigoEmpleadoAnterior');
            try {
                Empleado::where('codigoempleado', '=', $request -> codigoEmpleadoAnterior)->update($empleado);
                return redirect('empleado')->with('mensaje', 'Empleado Modificado');
            } catch(QueryException $e) {            
                return redirect('empleado')->with('mensaje', 'C??digo Empleado ya existente');
            }
        } else {
            return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'El salario no est?? en el rango correspondiente del puesto $'.$rangoSalarial -> salariominimo.' - $'.$rangoSalarial -> salariomaximo);            
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
        $user->en_proceso=null;
        $user->save();              
        $data = array('email'=> $user->email, 'name'=>$user->name);
        //Para enviar correo de confirmacion de nuevo
        Mail::send('Mail.activar', $data, function ($message) use ($data){
            $message->to($data['email'], $data['name']);
            $message->subject('Activaci??n de su cuenta');            
        });
        return back()->with('mensaje', 'Empleado Activado');       
    }

    public function desactivar(User $user)
    {
        $user->activo=false;
        $user->save();        
        $data = array('email'=> $user->email, 'name'=>$user->name);
        //Para enviar correo de confirmacion de nuevo
        Mail::send('Mail.desactivar', $data, function ($message) use ($data){
            $message->to($data['email'], $data['name']);
            $message->subject('Desactivaci??n de su cuenta');            
        });
        return back()->with('mensaje', 'Empleado Desactivado');    
        
    }

    public function pedirActivacion()
    {
        $user= Auth::User();
        $user->en_proceso=now();
        $user->save();
        $empleado= Empleado::where('iduser',$user->id)->first();  
        //Solicitar proceso de activacion por correo
        $data = array('name'=>$user->name, 'id'=>$user->id, 'empleadocod'=>$empleado->codigoempleado);
        //Para enviar correo de confirmacion de nuevo
        Mail::send('Mail.pedirActivacion', $data, function ($message) use ($data){
            $message->to("gestor@mailinator.com", "Admin");
            $message->subject('Solicitud de reactivaci??n de cuenta');            
        });
        return redirect(route('home'));
    }

    public function inactivo()
    {
        return view('auth.active');
    }

    public function inactivos()
    {
        return User::where('activo', 0)->paginate(5);
    }

    public function perfilInactivo(User $user)
    {
        return $user;       
    }

    public function obtenerCantidadEmpleados(){
        $empleados = Empleado::all();
        $empleadosActivos = 0;
        foreach ($empleados as $e){
            $user = User::where('id', '=', $e -> iduser)->first();
            if($user -> activo == '1') {
                $empleadosActivos++;
            }
        }
        return $empleadosActivos;
    }
}
