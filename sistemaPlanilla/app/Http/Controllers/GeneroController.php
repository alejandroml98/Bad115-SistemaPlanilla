<?php

namespace App\Http\Controllers;

use App\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosGenero['generos'] = Genero::paginate(5);
        return view('genero.index', $datosGenero);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $genero = request()->except('_token');
        Genero::insert($genero);
        return redirect('genero')->with('mensaje', 'Genero Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genero = Genero::findOrFail($id);
        return view('genero.edit', compact('genero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $genero = request()->except(['_token', '_method']);
        Genero::where('idgenero', '=', $id)->update($genero);
        return redirect('genero')->with('mensaje', 'Genero Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genero::destroy($id);
        return redirect('genero')->with('mensaje', 'Genero Eliminado');
    }
}
