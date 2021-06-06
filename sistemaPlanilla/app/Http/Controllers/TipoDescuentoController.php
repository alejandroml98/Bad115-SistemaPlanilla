<?php

namespace App\Http\Controllers;

use App\TipoDescuento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoDescuentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosTipoDescuento['tipoDescuentos'] = TipoDescuento::all();
        return view('tipodescuento.index', $datosTipoDescuento);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipodescuento.create');
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
            'nombreTipoDescuento' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú@ ]*$/', 'unique:tipo_descuentos']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $validator = Validator::make($request->all(), $campos, $mensaje);
        if ($validator->fails()){
            return back()
            ->withErrors($validator) // send back all errors to the login form
            ->withInput()
            ->with('peticion', 'crear');
        }
        else{
            $descuento = request()->except('_token');
            TipoDescuento::insert($descuento);
            return redirect('tipodescuento')->with('mensaje', 'Descuento Creado');
        }       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoDescuento  $tipoDescuento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDescuento $tipoDescuento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoDescuento  $tipoDescuento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoDescuento = TipoDescuento::findOrFail($id);
        return view('tipodescuento.edit', compact('tipoDescuento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoDescuento  $tipoDescuento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombreTipoDescuento' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú@ ]*$/', 'unique:tipo_descuentos']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $validator = Validator::make($request->all(), $campos, $mensaje);
        if ($validator->fails()){
            return back()
            ->withErrors($validator) // send back all errors to the login form
            ->withInput()
            ->with('peticion', ('editar'.$id));
        }
        else {
            $descuento = request()->except(['_token', '_method']);
            TipoDescuento::where('idtipodescuento', '=', $id)->update($descuento);
            return redirect('tipodescuento')->with('mensaje', 'Descuento Modificado');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoDescuento  $tipoDescuento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoDescuento::where('idtipodescuento', '=', $id)->delete();
        return redirect('tipodescuento')->with('mensaje', 'Descuento Eliminado');
    }
}
