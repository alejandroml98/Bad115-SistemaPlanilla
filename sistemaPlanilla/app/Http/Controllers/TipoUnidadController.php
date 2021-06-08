<?php

namespace App\Http\Controllers;

use App\TipoUnidad;
use Illuminate\Http\Request;

class TipoUnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposUnidades = TipoUnidad::all();
        return view('tipounidad.index', compact('tiposUnidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposUnidades = TipoUnidad::all();
        return view('tipounidad.create', compact('tiposUnidades'));
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
            'nombreTipoUnidad' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/', 'unique:tipo_unidads'],            
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $tipoUnidad = request()->except('_token');
        TipoUnidad::insert($tipoUnidad);
        return redirect('tipounidad')->with('mensaje', 'Tipo Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoUnidad  $tipoUnidad
     * @return \Illuminate\Http\Response
     */
    public function show(TipoUnidad $tipoUnidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoUnidad  $tipoUnidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoUnidadSeleccionada = TipoUnidad::findOrFail($id);
        $tiposUnidades = TipoUnidad::all();
        return view('tipounidad.edit', compact('tiposUnidades', 'tipoUnidadSeleccionada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoUnidad  $tipoUnidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombreTipoUnidad' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],            
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $tipoUnidad = request()->except(['_token', '_method']);
        TipoUnidad::where('idtipounidad', '=', $id)->update($tipoUnidad);
        return redirect('tipounidad')->with('mensaje', 'Tipo Unidad Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoUnidad  $tipoUnidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoUnidad::where('idtipounidad', '=', $id)->delete();
        return redirect('tipounidad')->with('mensaje', 'Tipo Unidad Eliminada');
    }
}
