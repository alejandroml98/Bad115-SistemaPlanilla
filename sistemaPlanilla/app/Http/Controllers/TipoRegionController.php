<?php

namespace App\Http\Controllers;

use App\TipoRegion;
use Illuminate\Http\Request;

class TipoRegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosTiposRegion['tiposRegion'] = TipoRegion::all();
        return view('tiporegion.index', $datosTiposRegion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiporegion.create');
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
            'nombreTipoRegion' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
            'nombreTipoSubRegion' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $tipoRegion = request()->except('_token');
        TipoRegion::insert($tipoRegion);
        return redirect('tiporegion')->with('mensaje', 'Tipo Región Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoRegion  $tipoRegion
     * @return \Illuminate\Http\Response
     */
    public function show(TipoRegion $tipoRegion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoRegion  $tipoRegion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoRegion = TipoRegion::findOrFail($id);
        return view('tiporegion.edit', compact('tipoRegion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoRegion  $tipoRegion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombreTipoRegion' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
            'nombreTipoSubRegion' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $tipoRegion = request()->except(['_token', '_method']);
        TipoRegion::where('idtiporegion', '=', $id)->update($tipoRegion);
        return redirect('tiporegion')->with('mensaje', 'Tipo Región Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoRegion  $tipoRegion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoRegion::where('idtiporegion', '=', $id)->delete();
        return redirect('tiporegion')->with('mensaje', 'Tipo Región Eliminado');
    }
}
