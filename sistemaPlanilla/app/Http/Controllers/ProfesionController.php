<?php

namespace App\Http\Controllers;

use App\Profesion;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Log;

class ProfesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosProfesion['profesiones'] = Profesion::paginate(5);
        return view('profesion.index', $datosProfesion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesion.create');
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
            'nombreProfesion' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/', 'unique:profesions']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $profesion = request()->except('_token');
        Profesion::insert($profesion);
        return redirect('profesion')->with('mensaje', 'Profesión Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profesion  $profesion
     * @return \Illuminate\Http\Response
     */
    public function show(Profesion $profesion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profesion  $profesion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesion = Profesion::findOrFail($id);
        return view('profesion.edit', compact('profesion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profesion  $profesion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombreProfesion' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/', 'unique:profesions']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];        
        $this->validate($request, $campos, $mensaje);
        $profesion = request()->except(['_token', '_method']);
        $requestMethod = $this->method();
        Profesion::where('idprofesion', '=', $id)->update($profesion);
        $mensaje = 'Profesión Modificada';
        return redirect('profesion')->with(compact('mensaje', 'requestMethod'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profesion  $profesion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profesion::destroy($id);
        return redirect('profesion')->with('mensaje', 'Profesión Eliminada');
    }
}
