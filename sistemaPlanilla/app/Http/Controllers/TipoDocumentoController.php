<?php

namespace App\Http\Controllers;

use App\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosTiposDocumento['tiposDocumentos'] = TipoDocumento::paginate(5);
        return view('tipodocumento.index', $datosTiposDocumento);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipodocumento.create');
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
            'nombreTipoDocumento' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú@ ]*$/', 'unique:tipo_documentos'],
            'cadenaRegex' => ['required','string', 'max:100']
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
            $tipoDocumento = request()->except('_token');
            TipoDocumento::insert($tipoDocumento);
            return redirect('tipodocumento')->with('mensaje', 'Tipo Documento Creado');
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDocumento $tipoDocumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);
        return view('tipodocumento.edit', compact('tipoDocumento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombreTipoDocumento' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú@ ]*$/'],
            'cadenaRegex' => ['required','string', 'max:100']
        ];
        $mensaje = [
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
            $tipoDocumento = request()->except(['_token', '_method']);
            TipoDocumento::where('idtipodocumento', '=', $id)->update($tipoDocumento);
            return redirect('tipodocumento')->with('mensaje', 'Tipo Documento Modificado');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoDocumento::destroy($id);
        return redirect('tipodocumento')->with('mensaje', 'Tipo Documento Eliminado');
    }
}
