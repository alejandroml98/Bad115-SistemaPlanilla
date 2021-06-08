<?php

namespace App\Http\Controllers;

use App\CentroCostos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CentroCostosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosCentroCostos['centroCostos'] = CentroCostos::all();
        return view('centrocostos.index', $datosCentroCostos);  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('centrocostos.create');
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
            'presupuestoInicial' => ['required','between:0,999999', 'min:0'],
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe',
            "min" => 'El :attribute debe ser mayor a 0',
        ];
        $validator = Validator::make($request->all(), $campos, $mensaje);
        if ($validator->fails()){
            return back()
            ->withErrors($validator) // send back all errors to the login form
            ->withInput()
            ->with('peticion', 'crear');
        }
        else{
            $centrocostos = request()->except('_token');
            CentroCostos::insert($centrocostos);
            return redirect('centrocostos')->with('mensaje', 'Presupuesto Inicial Asignado');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CentroCostos  $centroCostos
     * @return \Illuminate\Http\Response
     */
    public function show(CentroCostos $centroCostos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CentroCostos  $centroCostos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $centroCostos = CentroCostos::findOrFail($id);
        return view('centrocostos.edit', compact('centroCostos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CentroCostos  $centroCostos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'presupuestoInicial' => ['required','between:0,999999', 'min:0'],
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe',
            "min" => 'El :attribute debe ser mayor a 0',
        ];
        $validator = Validator::make($request->all(), $campos, $mensaje);
        if ($validator->fails()){
            return back()
            ->withErrors($validator) // send back all errors to the login form
            ->withInput()
            ->with('peticion', ('editar'.$id));
        }
        else {
            $centrocostos = request()->except(['_token', '_method']);
            CentroCostos::where('idcentrocostos', '=', $id)->update( $centrocostos);
            return redirect('centrocostos')->with('mensaje', 'Presupuesto Inicial Modificado');
        }     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CentroCostos  $centroCostos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CentroCostos::where('idcentrocostos', '=', $id)->delete();
        return redirect('centrocostos')->with('mensaje', 'Presupuesto Eliminado');
    }
}
