<?php

namespace App\Http\Controllers;

use App\EstadoCivil;
use Illuminate\Http\Request;

class EstadoCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosEstadoCivil['estadosCiviles'] = EstadoCivil::paginate(5);
        return view('estadocivil.index', $datosEstadoCivil);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadocivil.create');
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
            'nombreEstadoCivil' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú@ ]*$/', 'unique:estado_civils']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $estadoCivil = request()->except('_token');
        EstadoCivil::insert($estadoCivil);
        return redirect('estadocivil')->with('mensaje', 'Estado Civil Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoCivil $estadoCivil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadoCivil = EstadoCivil::findOrFail($id);
        return view('estadocivil.edit', compact('estadoCivil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombreEstadoCivil' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú@ ]*$/', 'unique:estado_civils']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $estadoCivil = request()->except(['_token', '_method']);
        EstadoCivil::where('idestadocivil', '=', $id)->update($estadoCivil);
        return redirect('estadocivil')->with('mensaje', 'Estado Civil Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EstadoCivil::where('idestadocivil', '=', $id)->delete();
        return redirect('estadocivil')->with('mensaje', 'Estado Civil Eliminado');
    }
}
