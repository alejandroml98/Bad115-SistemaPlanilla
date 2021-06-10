<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\TipoDocumento;
use App\TipoDocumento_Empleado;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoDocumentoEmpleadoController extends Controller
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
        $tiposDocumentos = TipoDocumento::all();
        return view('tipodocumentoempleado.create', compact('empleados', 'empleado', 'tiposDocumentos'));
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
            'idTipoDocumento' => ['required'],
            'valorDocumento' => ['required', 'string', 'max:100'],            
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $tipoDocumentoEmpleado = request()->except('_token');
        DB::table('tipodocumento_empleados')->insert($tipoDocumentoEmpleado);
        return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Documento Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoDocumento_Empleado  $tipoDocumento_Empleado
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDocumento_Empleado $tipoDocumento_Empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoDocumento_Empleado  $tipoDocumento_Empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoDocumentoEmpleado = TipoDocumento_Empleado::findOrFail($id);        
        $empleado = DB::table('empleados')->where('codigoempleado', '=', $tipoDocumentoEmpleado -> codigoempleado)->first();                   
        $tiposDocumentos = TipoDocumento::all();
        return view('tipodocumentoempleado.edit', compact('tipoDocumentoEmpleado', 'empleado', 'tiposDocumentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoDocumento_Empleado  $tipoDocumento_Empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'idTipoDocumento' => ['required'],
            'valorDocumento' => ['required', 'string', 'max:100'],            
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $tipoDocumentoEmpleado = request()->except('_token', '_method');
        try {
            TipoDocumento_Empleado::where('idtipodocumentoempleado', '=', $id)->update($tipoDocumentoEmpleado);
            return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Documento Modificado');
        } catch(QueryException $e) {            
            return redirect('empleado')->with('mensaje', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoDocumento_Empleado  $tipoDocumento_Empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        TipoDocumento_Empleado::where('idtipodocumentoempleado', '=', $id)->delete();
        return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Documento Eliminado');
    }
}
