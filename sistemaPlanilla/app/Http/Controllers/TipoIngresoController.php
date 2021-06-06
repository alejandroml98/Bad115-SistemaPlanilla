<?php

namespace App\Http\Controllers;

use App\TipoIngreso;
use Illuminate\Http\Request;

class TipoIngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosTiposIngreso['tiposIngresos'] = TipoIngreso::all();
        return view('tipoingresos.index', $datosTiposIngreso);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoingresos.create');
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
            'nombreTipoIngresos' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/', 'unique:tipo_ingresos']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $tipoingreso = request()->except('_token');
        TipoIngreso::insert($tipoingreso);
        return redirect('tipoingresos')->with('mensaje', 'Ingreso Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoIngreso  $tipoIngreso
     * @return \Illuminate\Http\Response
     */
    public function show(TipoIngreso $tipoIngreso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoIngreso  $tipoIngreso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoIngreso = TipoIngreso::findOrFail($id);
        return view('tipoingresos.edit', compact('tipoIngreso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoIngreso  $tipoIngreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $campos = [
            'nombreTipoIngresos' => ['required','string', 'max:100', 'regex:/^[a-zA-Z ]*$/', 'unique:tipo_ingresos']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $tipoingreso = request()->except(['_token', '_method']);
        TipoIngreso::where('idtipoingresos', '=', $id)->update($tipoingreso);
        return redirect('tipoingresos')->with('mensaje', 'Ingreso Modificado');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoIngreso  $tipoIngreso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoIngreso::where('idtipoingresos', '=', $id)->delete();
        return redirect('tipoingresos')->with('mensaje', 'Ingreso Eliminado');
    }
}
