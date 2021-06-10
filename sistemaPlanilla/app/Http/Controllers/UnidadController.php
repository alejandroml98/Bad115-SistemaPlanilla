<?php

namespace App\Http\Controllers;

use App\CentroCostos;
use App\TipoUnidad;
use App\Unidad;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades = Unidad::all();
        $tiposUnidades = TipoUnidad::all();
        return view('unidad.index', compact('unidades', 'tiposUnidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidad::all();
        $tiposUnidades = TipoUnidad::all();
        return view('unidad.create', compact('unidades', 'tiposUnidades'));
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
            'nombreUnidad' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/', 'unique:unidads'],
            'idTipoUnidad' => ['required'],
            'codigoUnidad' => ['required','string', 'max:7', 'regex:/[a-zA-Z]{2}[0-9]{5}$/']      
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $unidad = request()->except('_token');
        Unidad::insert($unidad);
        return redirect('unidad')->with('mensaje', 'Unidad Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function show(Unidad $unidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposUnidades = TipoUnidad::all();
        $unidades = Unidad::all();
        $unidadSeleccionada = Unidad::findOrFail($id);
        //Para Centro Costos
        $unidadesCentroCostos = DB::table('unidad_centrocostos')->where('codigounidad','=',$id)->get();
        $centrosCostos = CentroCostos::all();
        return view('unidad.edit', compact('tiposUnidades', 'unidadSeleccionada', 'unidades', 'unidadesCentroCostos', 'centrosCostos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidad $unidad)
    {
        $campos = [
            'nombreUnidad' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
            'idTipoUnidad' => ['required'],
            'codigoUnidad' => ['required','string', 'max:7', 'regex:/[a-zA-Z]{2}[0-9]{5}$/']      
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);                                                                  
        try {
            $unidad = request()->except('_token','_method', 'codigoUnidadAnterior');            
            Unidad::where('codigounidad', '=', $request -> codigoUnidadAnterior)->update($unidad);        
            return redirect('unidad')->with('mensaje', 'Unidad Modificada');
        } catch(QueryException $e) {            
            return redirect('unidad')->with('mensaje', 'Código Unidad ya existente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Unidad::where('codigounidad', '=', $id)->delete();
        return redirect('unidad')->with('mensaje', 'Unidad Eliminada');
    }
}
