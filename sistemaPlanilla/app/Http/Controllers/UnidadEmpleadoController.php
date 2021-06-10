<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Unidad;
use App\UnidadEmpleado;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnidadEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($codigoempleado)
    {
        $empleado = Empleado::findOrFail($codigoempleado);
        $empleados = Empleado::all();
        $unidadesEmpleado = DB::table('unidad_empleados')->where('codigoempleado', '=', $codigoempleado)->get();    
        $unidadesTabla = Unidad::all();
        $unidadesAsignadas = array();
        foreach($unidadesTabla as $p){
            foreach($unidadesEmpleado as $pe){
                if($p -> codigounidad == $pe -> codigounidad){
                    array_push($unidadesAsignadas, $p);
                }
            }
        }
        $unidades = $unidadesTabla -> diff($unidadesAsignadas);
        return view('unidadempleado.create', compact('empleados', 'empleado', 'unidades'));
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
            'codigoUnidad' => ['required'],
            'codigoEmpleado' => ['required', 'unique:unidad_empleados']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'Solo puede pertenece a una unidad'
        ];
        $this->validate($request, $campos, $mensaje);
        if (isset($request -> esJefe)) {
            $request -> merge(['esJefe' => '1']);
        } else {
            $request -> merge(['esJefe' => '0']);
        }
        $unidadEmpleado = request()->except('_token');
        UnidadEmpleado::insert($unidadEmpleado);      
        return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Unidad Asignada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnidadEmpleado  $unidadEmpleado
     * @return \Illuminate\Http\Response
     */
    public function show(UnidadEmpleado $unidadEmpleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnidadEmpleado  $unidadEmpleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidadEmpleado = UnidadEmpleado::findOrFail($id);
        $empleado = DB::table('empleados')->where('codigoempleado', '=', $unidadEmpleado -> codigoempleado)->first();                           
        $unidadesEmpleados = DB::table('unidad_empleados')->where('codigoempleado', '=', $unidadEmpleado -> codigoempleado)->get();            
        $unidadesTabla = Unidad::all();
        $unidadesAsignadas = array();        
        foreach($unidadesTabla as $p){
            foreach($unidadesEmpleados as $pe){
                if($p -> codigounidad == $pe -> codigounidad || $unidadEmpleado -> codigounidad == $p -> codigounidad){
                    array_push($unidadesAsignadas, $p);
                }
            }
        }
        $unidades = $unidadesTabla -> diff($unidadesAsignadas);
        $unidadSeleccionada = Unidad::where('codigounidad','=',$unidadEmpleado -> codigounidad)->first();
        $unidades -> push($unidadSeleccionada);        
        return view('unidadempleado.edit', compact('unidadEmpleado', 'empleado', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnidadEmpleado  $unidadEmpleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'codigoUnidad' => ['required'],
            'codigoEmpleado' => ['required', 'unique:unidad_empleados,codigoempleado,' . $id.',idunidadempleado']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'Solo puede pertenece a una unidad'
        ];
        $this->validate($request, $campos, $mensaje);
        if (isset($request -> esJefe)) {
            $request -> merge(['esJefe' => '1']);
        } else {
            $request -> merge(['esJefe' => '0']);
        }
        $unidadEmpleado = request()->except('_token', '_method');
        try {
            UnidadEmpleado::where('idunidadempleado', '=', $id)->update($unidadEmpleado);
            return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Unidad Modificada');
        } catch(QueryException $e) {            
            return redirect('empleado')->with('mensaje', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnidadEmpleado  $unidadEmpleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        UnidadEmpleado::where('idunidadempleado', '=', $id)->delete();
        return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Unidad Eliminada');
    }
}
