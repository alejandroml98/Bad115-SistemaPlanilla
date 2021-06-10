<?php

namespace App\Http\Controllers;

use App\CatalogoComision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatalogoComisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosCatalogoComision['catalogoComisions'] = CatalogoComision::all();
        return view('catalogocomision.index', $datosCatalogoComision);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogocomision.create');
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
            'nombreComision' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/', 'unique:catalogo_comisions'],
            'porcentaje' => ['required','between:0,100.00', 'min:0'],
            'valMinComision' => ['required','between:0,999999', 'min:0', 'lt:valMaxComision'],
            'valMaxComision' => ['required','between:0,999999', 'min:0', 'gt:valMinComision']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe',
            "min" => 'El :attribute debe ser mayor a 0',
            "gt" => 'El :attribute debe ser menor que Comision Mínimo',
            "lt" => 'El :attribute debe ser mayor que Comision Máximo' 
           
        ];
        $validator = Validator::make($request->all(), $campos, $mensaje);
        if ($validator->fails()){
            return back()
            ->withErrors($validator) // send back all errors to the login form
            ->withInput()
            ->with('peticion', 'crear');
        }
        else{
            $comision = request()->except('_token');
        CatalogoComision::insert($comision);
        return redirect('catalogocomision')->with('mensaje', 'Comision Creado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CatalogoComision  $catalogoComision
     * @return \Illuminate\Http\Response
     */
    public function show(CatalogoComision $catalogoComision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CatalogoComision  $catalogoComision
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalogoComision = CatalogoComision::findOrFail($id);
        return view('catalogocomision.edit', compact('catalogoComision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CatalogoComision  $catalogoComision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       


            $campos = [
                'nombreComision' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
                'porcentaje' => ['required','between:0,100.00', 'min:0', 'max:100'],
                'valMinComision' => ['required','between:0,999999', 'min:0', 'lt:valMaxComision'],
                'valMaxComision' => ['required','between:0,999999', 'min:0', 'gt:valMinComision']
            ];
            $mensaje = [
                "required" => 'El :attribute es requerido',
                "regex" => 'El :attribute no acepta números o caracteres especiales',
                "unique" => 'El :attribute que escribió ya existe',
                "min" => 'El :attribute debe ser mayor a 0',
                "gt" => 'El :attribute debe ser menor que Comision Mínimo',
                "lt" => 'El :attribute debe ser mayor que Comision Máximo'           
            ];
            $validator = Validator::make($request->all(), $campos, $mensaje);
            if ($validator->fails()){
                return back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput()
                ->with('peticion', ('editar'.$id));
            }
            else {
                $comision = request()->except(['_token', '_method']);
            CatalogoComision::where('idcatalogocomision', '=', $id)->update($comision);
            return redirect('catalogocomision')->with('mensaje', 'Comision Modificada');
            }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CatalogoComision  $catalogoComision
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CatalogoComision::where('idcatalogocomision', '=', $id)->delete();
        return redirect('catalogocomision')->with('mensaje', 'Comision Eliminada');
    }
}