<?php

namespace App\Http\Controllers;

use App\Direccion;
use App\Pais;
use App\Region;
use App\SubRegion;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class DireccionController extends Controller
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
        $direcciones = Direccion::all();
        return view('direccion.index', compact('direcciones', 'paises', 'regiones', 'subRegiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subRegiones = SubRegion::all();
        $regiones = Region::all();
        $paises = Pais::all();
        return view('direccion.create', compact('paises', 'regiones', 'subRegiones'));
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
            'idSubRegion' => ['required','int'],
            'detalleDireccion' => ['required','string', 'max:500']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje); 
        $data = request()->except('_token','pais','region');
        try
        {
            SubRegion::findOrFail($data['idSubRegion']);
            Direccion::insert($data);
            return redirect('direccion')->with('mensaje', 'Dirección Creada');         
        }    
        catch(ModelNotFoundException $e)
        {
            return redirect('direccion')->with('mensaje', 'Sub Región no encontrada');
        }         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function show(Direccion $direccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $direccion = Direccion::findOrFail($id);
        $subRegiones = SubRegion::all();
        $regiones = Region::all();
        $paises = Pais::all();
        return view('direccion.edit', compact('direccion', 'subRegiones', 'regiones', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'idSubRegion' => ['required','int'],
            'detalleDireccion' => ['required','string', 'max:500']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje); 
        $data = request()->except('_token','pais','region');
        try
        {
            SubRegion::findOrFail($data['idSubRegion']);
            $direccion = request()->except(['_token', '_method','pais','region']);
            Direccion::where('iddireccion', '=', $id)->update($direccion);
            return redirect('direccion')->with('mensaje', 'Direccion Modificada');         
        }    
        catch(ModelNotFoundException $e)
        {
            return redirect('direccion')->with('mensaje', 'Sub Región no encontrada');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Direccion::where('iddireccion', '=', $id)->delete();
        return redirect('direccion')->with('mensaje', 'Dirección Eliminada');
    }
}
