<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\TipoDescuento;
use App\TipoDescuento_Empleado;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoDescuentoEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          
        $datosTipoDescuentoEmpleado['tipoDescuentos'] = TipoDescuento_Empleado::all();
        return view('tipodescuento.index', $datosTipoDescuentoEmpleado);
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
        $tiposDescuentos = TipoDescuento::all();
        return view('tipodescuentoempleado.create', compact('empleados', 'empleado', 'tiposDescuentos'));
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
            'idTipoDescuento' => ['required'],
            'valorTipoDescuentoEmpleado' => ['required', 'numeric', 'min:0', 'between:0, 999999.99'],
            'contadorTipoDescuentoEmpleado' => ['required', 'numeric', 'int']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $tipoDescuentoEmpleado = request()->except('_token');
        DB::table('tipodescuento_empleados')->insert($tipoDescuentoEmpleado);
        return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Descuento Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoDescuento_Empleado  $tipoDescuento_Empleado
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDescuento_Empleado $tipoDescuento_Empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoDescuento_Empleado  $tipoDescuento_Empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoDescuentoEmpleado = TipoDescuento_Empleado::findOrFail($id);        
        $empleado = DB::table('empleados')->where('codigoempleado', '=', $tipoDescuentoEmpleado -> codigoempleado)->first();                   
        $tiposDescuentos = TipoDescuento::all();
        return view('tipodescuentoempleado.edit', compact('tipoDescuentoEmpleado', 'empleado', 'tiposDescuentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoDescuento_Empleado  $tipoDescuento_Empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'idTipoDescuento' => ['required'],
            'valorTipoDescuentoEmpleado' => ['required', 'numeric', 'min:0', 'between:0, 999999.99'],
            'contadorTipoDescuentoEmpleado' => ['required', 'numeric', 'int']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $tipoDescuentoEmpleado = request()->except('_token', '_method');
        try {
            TipoDescuento_Empleado::where('idtipodescuentoempleado', '=', $id)->update($tipoDescuentoEmpleado);
            return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Descuento Modificado');
        } catch(QueryException $e) {            
            return redirect('empleado')->with('mensaje', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoDescuento_Empleado  $tipoDescuento_Empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        TipoDescuento_Empleado::where('idtipodescuentoempleado', '=', $id)->delete();
        return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Descuento Eliminado');
    }
}
