<?php

namespace App\Http\Controllers;

use App\Direccion;
use App\Empresa;
use App\Pais;
use App\Region;
use App\SubRegion;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direcciones = Direccion::all();
        $subRegiones = SubRegion::all();
        $regiones = Region::all();
        $paises = Pais::all();
        try {
            $empresa = Empresa::all() -> first();            
            return view('empresa.index', compact('empresa', 'direcciones', 'subRegiones', 'regiones', 'paises'));
        } catch (ModelNotFoundException $empresa) {
            return view('empresa.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direcciones = Direccion::all();
        $subRegiones = SubRegion::all();
        $regiones = Region::all();
        $paises = Pais::all();
        return view('empresa.create', compact('direcciones', 'subRegiones', 'regiones', 'paises'));
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
            'codigoEmpresa' => ['required','string', 'max:7', 'regex:/[a-zA-Z]{2}[0-9]{5}$/'],
            'nombreEmpresa' => ['required','string', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
            'nit' => ['required','string', 'regex:/[0-9]{14}$/', 'unique:empresas'],
            'nic' => ['required','string', 'regex:/[0-9]{14}$/', 'unique:empresas'],
            'telefonoEmpresa' => ['required','string', 'regex:/[0-9]{8}$/', 'unique:empresas'],
            'paginaWeb' => ['required','string', 'url', 'unique:empresas'],
            'correoElectronicoEmpresa' => ['required', 'string', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', 'unique:empresas'],
            'salarioMinimo' => ['required','between:0,999999.99', 'min:0'],
            'idDireccion' => ['required']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no es del formato adecuado',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje); 
        $data = request()->except('_token');
        try
        {
            Direccion::findOrFail($data['idDireccion']);
            Empresa::insert($data);
            return redirect('empresa')->with('mensaje', 'Empresa Registrada');         
        }    
        catch(ModelNotFoundException $e)
        {
            return redirect('empresa')->with('mensaje', 'Dirección no encontrada');
        }      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'codigoEmpresa' => ['required','string', 'max:7', 'regex:/[a-zA-Z]{2}[0-9]{5}$/'],
            'nombreEmpresa' => ['required','string', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
            'nit' => ['required','string', 'regex:/[0-9]{14}$/'],
            'nic' => ['required','string', 'regex:/[0-9]{14}$/'],
            'telefonoEmpresa' => ['required','string', 'regex:/[0-9]{8}$/'],
            'paginaWeb' => ['required','string', 'url'],
            'correoElectronicoEmpresa' => ['required', 'string', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'salarioMinimo' => ['required','between:0,999999.99', 'min:0'],
            'idDireccion' => ['required']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no es del formato adecuado',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);        
        if (isset($request -> periodoPago)) {
            $request -> merge(['periodoPago' => '1']);
        } else {
            $request -> merge(['periodoPago' => '0']);
        }
        $empresa = request()->except('_token','_method', 'codigoEmpresaAnterior');        
        try {
            Empresa::where('codigoempresa', '=', $request -> codigoEmpresaAnterior)->update($empresa);
            return redirect('empresa')->with('mensaje', 'Empresa Modificada');
        } catch(QueryException $e) {            
            return redirect('empresa')->with('mensaje', 'Código Empresa ya existente');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
