<?php

namespace App\Http\Controllers;

use App\Pais;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Pais::all();
        $regiones = Region::all();
        return view('region.index', compact('paises', 'regiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Pais::all();
        return view('region.create', compact('paises'));
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
            'nombreRegion' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/', 'unique:regions'],
            'idPais' => ['required', 'int']
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
            Pais::findOrFail($data['idPais']);
            Region::insert($data);
            return redirect('region')->with('mensaje', 'Región Creada');         
        }    
        catch(ModelNotFoundException $e)
        {
            return redirect('region')->with('mensaje', 'País No Encontrado');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paises = Pais::all();
        $region = Region::findOrFail($id);    
        return view('region.edit', compact('region', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombreRegion' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/', 'unique:regions'],
            'idPais' => ['required', 'int']
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
            Pais::findOrFail($data['idPais']);
            $region = request()->except(['_token', '_method']);
            Region::where('idregion', '=', $id)->update($region);
            return redirect('region')->with('mensaje', 'Región Modificada');         
        }    
        catch(ModelNotFoundException $e)
        {
            return redirect('region')->with('mensaje', 'País no encontrado');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Region::where('idregion', '=', $id)->delete();
        return redirect('region')->with('mensaje', 'Región Eliminada');
    }
}
