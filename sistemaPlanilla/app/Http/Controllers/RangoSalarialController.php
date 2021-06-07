<?php

namespace App\Http\Controllers;

use App\RangoSalarial;
use Illuminate\Http\Request;

class RangoSalarialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rangosSalariales = RangoSalarial::all();
        return view('rangosalarial.index', compact('rangosSalariales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rangosalarial.create');
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
            'salarioMaximo' => ['required','between:0,999999.99', 'min:0', 'gt:salarioMinimo'],
            'salarioMinimo' => ['required','between:0,999999.99', 'min:0', 'lt:salarioMaximo']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe',
            "min" => 'El :attribute debe ser mayor a 0',
            "gt" => 'El :attribute debe ser mayor que Salario Mínimo',
            "lt" => 'El :attribute debe ser menor que Salario Máximo'            
        ];
        $this->validate($request, $campos, $mensaje);
        $rangoSalarial = request()->except('_token');
        RangoSalarial::insert($rangoSalarial);
        return redirect('rangosalarial')->with('mensaje', 'Rango Salarial Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RangoSalarial  $rangoSalarial
     * @return \Illuminate\Http\Response
     */
    public function show(RangoSalarial $rangoSalarial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RangoSalarial  $rangoSalarial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rangoSalarial = RangoSalarial::findOrFail($id);
        return view('rangosalarial.edit', compact('rangoSalarial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RangoSalarial  $rangoSalarial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'salarioMaximo' => ['required','between:0,999999.99', 'min:0', 'gt:salarioMinimo'],
            'salarioMinimo' => ['required','between:0,999999.99', 'min:0', 'lt:salarioMaximo']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe',
            "min" => 'El :attribute debe ser mayor a 0',
            "gt" => 'El :attribute debe ser mayor que Salario Mínimo',
            "lt" => 'El :attribute debe ser menor que Salario Máximo'            
        ];
        $this->validate($request, $campos, $mensaje);
        $rangoSalarial = request()->except('_token', '_method');
        RangoSalarial::where('idrangosalarial', '=', $id)->update($rangoSalarial);
        return redirect('rangosalarial')->with('mensaje', 'Rango Salarial Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RangoSalarial  $rangoSalarial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RangoSalarial::where('idrangosalarial', '=', $id)->delete();
        return redirect('rangosalarial')->with('mensaje', 'Rango Salarial Eliminado');
    }
}
