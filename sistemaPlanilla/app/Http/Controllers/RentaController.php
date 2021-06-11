<?php

namespace App\Http\Controllers;

use App\Renta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosRenta['rentas'] = Renta::all();
        return view('renta.index', $datosRenta);  
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('renta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //aqui
        $campos = [
            'valMin' => ['required','between:0,999999', 'min:0', 'lt:valMax'],
            'valMax' => ['required','between:0,999999', 'min:0', 'gt:valMin'],
            'valorFijo' => ['required','between:0,999999', 'min:0'],
            'exceso' => ['required','between:0,999999', 'min:0'],
            'periodo' => ['required','string', 'max:1', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/']
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
            $renta = request()->except('_token');
            Renta::insert($renta);
            return redirect('renta')->with('mensaje', 'Renta Creada');
        }
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function show(Renta $renta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $renta = Renta::findOrFail($id);
        return view('renta.edit', compact('renta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      

        //movimiento
        $campos = [
            'valMin' => ['required','between:0,999999', 'min:0', 'lt:valMax'],
            'valMax' => ['required','between:0,999999', 'min:0', 'gt:valMin'],
            'valorFijo' => ['required','between:0,999999', 'min:0'],
            'exceso' => ['required','between:0,999999', 'min:0'],
            'periodo' => ['required','string', 'max:1', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/']
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
            $renta = request()->except(['_token', '_method']);
            Renta::where('idrenta', '=', $id)->update($renta);
            return redirect('renta')->with('mensaje', 'Tipo de Renta Modificada');
        } 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Renta::where('idrenta', '=', $id)->delete();
        return redirect('renta')->with('mensaje', 'Renta Eliminada');
    }
}
