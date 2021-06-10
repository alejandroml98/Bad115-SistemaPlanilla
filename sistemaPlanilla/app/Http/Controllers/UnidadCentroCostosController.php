<?php

namespace App\Http\Controllers;

use App\CentroCostos;
use App\Unidad;
use App\Unidad_CentroCostos;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnidadCentroCostosController extends Controller
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
    public function create($codigounidad)
    {
        $unidad = Unidad::findOrFail($codigounidad);
        $unidades = Unidad::all();
        $centrosCostos = CentroCostos::all();
        return view('unidadcentrocostos.create', compact('unidad', 'unidades', 'centrosCostos'));
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
            'idCentroCostos' => ['required'],
            'presupuestoFinal' => ['required', 'numeric', 'min:0', 'max:999999', 'between:0,999999.99'],
            'gastoTotal' => ['required', 'numeric', 'min:0', 'max:999999', 'between:0,999999.99'],
            'anio' => ['required', 'date']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $unidadCentroCostos = request()->except('_token');
        DB::table('unidad_centrocostos')->insert($unidadCentroCostos);
        return redirect()->action('UnidadController@edit', $request['codigoUnidad'])->with('mensaje', 'Centro Costos Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unidad_CentroCostos  $unidad_CentroCostos
     * @return \Illuminate\Http\Response
     */
    public function show(Unidad_CentroCostos $unidad_CentroCostos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unidad_CentroCostos  $unidad_CentroCostos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidadCentroCostos = Unidad_CentroCostos::findOrFail($id);        
        $unidad = DB::table('unidads')->where('codigounidad', '=', $unidadCentroCostos -> codigounidad)->first();                   
        $centrosCostos = CentroCostos::all();
        return view('unidadcentrocostos.edit', compact('unidadCentroCostos', 'unidad', 'centrosCostos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unidad_CentroCostos  $unidad_CentroCostos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'idCentroCostos' => ['required'],
            'presupuestoFinal' => ['required', 'numeric', 'min:0', 'max:999999', 'between:0,999999.99'],
            'gastoTotal' => ['required', 'numeric', 'min:0', 'max:999999', 'between:0,999999.99'],
            'anio' => ['required', 'date']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $unidadCentroCostos = request()->except('_token', '_method');
        try {
            Unidad_CentroCostos::where('idunidadcentrocostos', '=', $id)->update($unidadCentroCostos);
            return redirect()->action('UnidadController@edit', $request['codigoUnidad'])->with('mensaje', 'Centro Costos Modificado');
        } catch(QueryException $e) {            
            return redirect('empleado')->with('mensaje', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unidad_CentroCostos  $unidad_CentroCostos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Unidad_CentroCostos::where('idunidadcentrocostos', '=', $id)->delete();
        return redirect()->action('UnidadController@edit', $request['codigoUnidad'])->with('mensaje', 'Centro Costos Eliminado');
    }
}
