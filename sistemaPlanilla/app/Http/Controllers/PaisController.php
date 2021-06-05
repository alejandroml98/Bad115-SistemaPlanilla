<?php

namespace App\Http\Controllers;

use App\Pais;
use App\Region;
use App\TipoRegion;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposRegion = TipoRegion::all();
        $paises = Pais::all();
        return view('pais.index', compact('tiposRegion', 'paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposRegion = TipoRegion::all();
        return view('pais.create', compact('tiposRegion'));
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
            'nombrePais' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/', 'unique:pais'],
            'idTipoRegion' => ['required', 'int']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $data = request()->except('_token');
        try
        {
            TipoRegion::findOrFail($data['idTipoRegion']);
            Pais::insert($data);
            return redirect('pais')->with('mensaje', 'País Creado');         
        }    
        catch(ModelNotFoundException $e)
        {
            return redirect('pais')->with('mensaje', 'Tipo Región No Encontrada');
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function show(Pais $pais)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposRegion = TipoRegion::all();
        $pais = Pais::findOrFail($id);    
        return view('pais.edit', compact('tiposRegion', 'pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombrePais' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
            'idTipoRegion' => ['required', 'int']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $data = request()->except('_token');
        try
        {
            TipoRegion::findOrFail($data['idTipoRegion']);
            $pais = request()->except(['_token', '_method']);
            Pais::where('idpais', '=', $id)->update($pais);
            return redirect('pais')->with('mensaje', 'País Modificado');         
        }    
        catch(ModelNotFoundException $e)
        {
            return redirect('pais')->with('mensaje', 'Tipo Región No Encontrada');
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pais::where('idpais', '=', $id)->delete();
        return redirect('pais')->with('mensaje', 'País Eliminado');
    }

    public function obtenerRegiones(Pais $pais)
    {
        return DB::table('regions')->where('idpais', $pais -> idpais)->get();
    }
}
