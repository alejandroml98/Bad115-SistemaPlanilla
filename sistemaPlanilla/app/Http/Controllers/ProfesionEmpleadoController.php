<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Profesion;
use App\ProfesionEmpleado;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesionEmpleadoController extends Controller
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
        $profesionesEmpleado = DB::table('profesion_empleados')->where('codigoempleado', '=', $codigoempleado)->get();    
        $profesionesTabla = Profesion::all();
        $profesionesAsignadas = array();
        foreach($profesionesTabla as $p){
            foreach($profesionesEmpleado as $pe){
                if($p -> idprofesion == $pe -> idprofesion){
                    array_push($profesionesAsignadas, $p);
                }
            }
        }
        $profesiones = $profesionesTabla -> diff($profesionesAsignadas);        
        return view('profesionempleado.create', compact('empleados', 'empleado', 'profesiones'));
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
            'idProfesion' => ['required']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $profesionEmpleado = request()->except('_token');
        DB::table('profesion_empleados')->insert($profesionEmpleado);
        return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Descuento Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProfesionEmpleado  $profesionEmpleado
     * @return \Illuminate\Http\Response
     */
    public function show(ProfesionEmpleado $profesionEmpleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfesionEmpleado  $profesionEmpleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesionEmpleado = ProfesionEmpleado::findOrFail($id);        
        $empleado = DB::table('empleados')->where('codigoempleado', '=', $profesionEmpleado -> codigoempleado)->first();                           
        $profesionesEmpleados = DB::table('profesion_empleados')->where('codigoempleado', '=', $profesionEmpleado -> codigoempleado)->get();    
        $profesionesTabla = Profesion::all();
        $profesionesAsignadas = array();
        foreach($profesionesTabla as $p){
            foreach($profesionesEmpleados as $pe){
                if($p -> idprofesion == $pe -> idprofesion || $profesionEmpleado -> idprofesion == $p -> idprofesion){
                    array_push($profesionesAsignadas, $p);
                }
            }
        }
        $profesiones = $profesionesTabla -> diff($profesionesAsignadas);                  
        return view('profesionempleado.edit', compact('profesionEmpleado', 'empleado', 'profesiones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfesionEmpleado  $profesionEmpleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'idProfesion' => ['required']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);
        $profesionEmpleado = request()->except('_token', '_method');
        try {
            ProfesionEmpleado::where('idprofesionempleado', '=', $id)->update($profesionEmpleado);
            return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Profesión Modificado');
        } catch(QueryException $e) {            
            return redirect('empleado')->with('mensaje', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfesionEmpleado  $profesionEmpleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        ProfesionEmpleado::where('idprofesionempleado', '=', $id)->delete();
        return redirect()->action('EmpleadoController@edit', $request['codigoEmpleado'])->with('mensaje', 'Descuento Eliminado');
    }
}
