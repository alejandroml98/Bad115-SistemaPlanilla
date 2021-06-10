<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\TipoIngreso;
use App\TipoIngresos_Empleado;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoIngresosEmpleadoController extends Controller
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
        $tiposIngresos = TipoIngreso::all();
        return view('tipoingresoempleado.create', compact('empleados', 'empleado', 'tiposIngresos'));
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
            'idTipoIngresos' => ['required'],
            'valoTipoIngresoEmpleado' => ['required', 'numeric', 'min:0', 'between:0, 999999.99'],
            'contadorTipoIngresoEmpleado' => ['required', 'numeric', 'int']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $tipoIngresoEmpleado = request()->except('_token');
        DB::table('tipoingresos_empleados')->insert($tipoIngresoEmpleado);
        return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Descuento Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoIngresos_Empleado  $tipoIngresos_Empleado
     * @return \Illuminate\Http\Response
     */
    public function show(TipoIngresos_Empleado $tipoIngresos_Empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoIngresos_Empleado  $tipoIngresos_Empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoIngresoEmpleado = TipoIngresos_Empleado::findOrFail($id);        
        $empleado = DB::table('empleados')->where('codigoempleado', '=', $tipoIngresoEmpleado -> codigoempleado)->first();                   
        $tiposIngresos = TipoIngreso::all();
        return view('tipoingresoempleado.edit', compact('tipoIngresoEmpleado', 'empleado', 'tiposIngresos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoIngresos_Empleado  $tipoIngresos_Empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'idTipoIngresos' => ['required'],
            'valoTipoIngresoEmpleado' => ['required', 'numeric', 'min:0', 'between:0, 999999.99'],
            'contadorTipoIngresoEmpleado' => ['required', 'numeric', 'int']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $tipoIngresoEmpleado = request()->except('_token', '_method');
        try {
            TipoIngresos_Empleado::where('idtipoingresoempleado', '=', $id)->update($tipoIngresoEmpleado);
            return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Ingreso Modificado');
        } catch(QueryException $e) {            
            return redirect('empleado')->with('mensaje', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoIngresos_Empleado  $tipoIngresos_Empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        TipoIngresos_Empleado::where('idtipoingresoempleado', '=', $id)->delete();
        return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Ingreso Eliminado');
    }
}
