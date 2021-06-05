<?php

namespace App\Http\Controllers;

use App\Pais;
use App\Region;
use App\SubRegion;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SubRegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subRegiones = SubRegion::all();
        $regiones = Region::all();
        $paises = Pais::all();
        return view('subregion.index', compact('paises', 'regiones', 'subRegiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regiones = Region::all();
        $paises = Pais::all();
        return view('subregion.create', compact('regiones', 'paises'));
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
            'nombreSubRegion' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/', 'unique:sub_regions'],
            'idRegion' => ['required', 'int']
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
            Region::findOrFail($data['idRegion']);
            SubRegion::insert($data);
            return redirect('subregion')->with('mensaje', 'Sub Región Creada');         
        }    
        catch(ModelNotFoundException $e)
        {
            return redirect('subregion')->with('mensaje', 'Región no Encontrada');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubRegion  $subRegion
     * @return \Illuminate\Http\Response
     */
    public function show(SubRegion $subRegion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubRegion  $subRegion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regiones = Region::all();
        $paises = Pais::all();
        $subRegion = SubRegion::findOrFail($id);
        return view('subregion.edit', compact('regiones', 'paises', 'subRegion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubRegion  $subRegion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombreSubRegion' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
            'idRegion' => ['required', 'int']
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
            Region::findOrFail($data['idRegion']);
            $subRegion = request()->except(['_token', '_method']);
            SubRegion::where('idsubregion', '=', $id)->update($subRegion);
            return redirect('subregion')->with('mensaje', 'Sub Región Modificada');         
        }    
        catch(ModelNotFoundException $e)
        {
            return redirect('subregion')->with('mensaje', 'Región no encontrada');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubRegion  $subRegion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubRegion::where('idsubregion', '=', $id)->delete();
        return redirect('subregion')->with('mensaje', 'Sub Región Eliminada');
    }
}
