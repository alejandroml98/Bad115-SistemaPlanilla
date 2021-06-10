<?php

namespace App\Http\Controllers;

use App\Banco;
use App\CuentaBancaria;
use App\Empleado;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuentaBancariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($codigoempleado)
    {
        $empleado = Empleado::findOrFail($codigoempleado);
        $empleados = Empleado::all();
        $bancos = Banco::all();
        return view('cuentabancaria.create', compact('empleados', 'empleado', 'bancos'));
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
            'idBanco' => ['required'],
            'cuentaBancaria' => ['required', 'string', 'max:100', 'regex:/^[0-9]*$/'],
            'saldoCuentaBancaria' => ['required', 'numeric', 'min:0', 'max:999999.99']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $cuentaBancaria = request()->except('_token');
        CuentaBancaria::insert($cuentaBancaria);
        return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'CuentaBancaria Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CuentaBancaria  $cuentaBancaria
     * @return \Illuminate\Http\Response
     */
    public function show(CuentaBancaria $cuentaBancaria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CuentaBancaria  $cuentaBancaria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuentaBancaria = CuentaBancaria::findOrFail($id);
        $empleado = DB::table('empleados')->where('codigoempleado','=',$cuentaBancaria -> codigoempleado)->first();      
        $bancos = Banco::all();
        return view('cuentabancaria.edit', compact('cuentaBancaria', 'empleado', 'bancos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CuentaBancaria  $cuentaBancaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'idBanco' => ['required'],
            'cuentaBancaria' => ['required', 'string', 'max:100', 'regex:/^[0-9]*$/'],
            'saldoCuentaBancaria' => ['required', 'numeric', 'min:0', 'max:999999.99']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $cuentaBancaria = request()->except('_token', '_method');
        try {
            CuentaBancaria::where('idcuentabancaria', '=', $id)->update($cuentaBancaria);
            return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'CuentaBancaria Modificada');
        } catch(QueryException $e) {            
            return redirect('empleado')->with('mensaje', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CuentaBancaria  $cuentaBancaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        CuentaBancaria::where('idcuentabancaria', '=', $id)->delete();
        return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Cuenta Bancaria Eliminada');
    }
}
