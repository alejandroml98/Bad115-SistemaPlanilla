<?php

namespace App\Http\Controllers;

use App\Puesto;
use App\RangoSalarial;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rangosSalariales = RangoSalarial::all();
        $puestos = Puesto::all();
        return view('puesto.index', compact('rangosSalariales', 'puestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rangosSalariales = RangoSalarial::all();
        return view('puesto.create', compact('rangosSalariales'));
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
            'codigoPuesto' => ['required','string', 'max:7', 'regex:/[a-zA-Z]{2}[0-9]{5}$/', 'unique:puestos'],
            'nombrePuesto' => ['required','string', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/', 'unique:puestos']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute tiene que llevar primero 2 letras y después 5 números',            
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);        
        if (isset($request -> esAdministrativo)) {
            $request -> merge(['esAdministrativo' => '1']);
        } else {
            $request -> merge(['esAdministrativo' => '0']);
        }
        $puesto = request()->except('_token');
        Puesto::insert($puesto);
        return redirect('puesto')->with('mensaje', 'Puesto Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function show(Puesto $puesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puesto = Puesto::findOrFail($id);
        $rangosSalariales = RangoSalarial::all();
        return view('puesto.edit', compact('puesto', 'rangosSalariales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $campos = [
            'codigoPuesto' => ['required','string', 'max:7', 'regex:/[a-zA-Z]{2}[0-9]{5}$/'],
            'nombrePuesto' => ['required','string', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/']            
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute tiene que llevar primero 2 letras y después 5 números',            
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);        
        if (isset($request -> esAdministrativo)) {
            $request -> merge(['esAdministrativo' => '1']);
        } else {
            $request -> merge(['esAdministrativo' => '0']);
        }
        $puesto = request()->except('_token','_method', 'codigoPuestoAnterior');
        try {
            Puesto::where('codigopuesto', '=', $request -> codigoPuestoAnterior)->update($puesto);
            return redirect('puesto')->with('mensaje', 'Puesto Modificado');
        } catch(QueryException $e) {            
            return redirect('puesto')->with('mensaje', 'Código Puesto ya existente');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Puesto::destroy($id);
        return redirect('puesto')->with('mensaje', 'Puesto Eliminado');
    }
}
