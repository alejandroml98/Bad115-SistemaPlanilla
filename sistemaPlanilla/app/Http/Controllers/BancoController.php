<?php

namespace App\Http\Controllers;

use App\Banco;
use Illuminate\Http\Request;

class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosBanco['bancos'] = Banco::all();
        return view('banco.index', $datosBanco);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banco.create');
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
            'nombreBanco' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/', 'unique:bancos']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $banco = request()->except('_token');
        Banco::insert($banco);
        return redirect('banco')->with('mensaje', 'Banco Creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function show(Banco $banco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banco = Banco::findOrFail($id);
        return view('banco.edit', compact('banco'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombreBanco' => ['required','string', 'max:100', 'regex:/^[a-zA-Z ]*$/']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $banco = request()->except(['_token', '_method']);
        Banco::where('idbanco', '=', $id)->update($banco);
        return redirect('banco')->with('mensaje', 'Banco Modificado');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banco::where('idbanco', '=', $id)->delete();
        return redirect('banco')->with('mensaje', 'Banco Eliminado');

    }
}
