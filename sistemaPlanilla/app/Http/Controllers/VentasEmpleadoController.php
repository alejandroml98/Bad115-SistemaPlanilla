<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\VentasEmpleado;
use Illuminate\Http\Request;

class VentasEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all();
        $ventasEmpleado = VentasEmpleado::all();
        return view('ventasempleados.index', compact('empleados', 'ventasEmpleado'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::all();
        return view('ventasempleados.create', compact('empleados'));

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
            'codigoEmpleado' => ['required', 'int'],
            'valorVenta' => ['required','between:0,100.00', 'min:0'],
            'fechaVenta' => ['required','between:0,100.00', 'min:0']
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
            Empleado::findOrFail($data['codigoEmpleado']);
            VentasEmpleado::insert($data);
            return redirect('ventasempleado')->with('mensaje', 'Ventas Asignadas');         
        }    
        catch(ModelNotFoundException $e)
        {
            return redirect('ventasempleado')->with('mensaje', 'Empleado No Encontrado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VentasEmpleado  $ventasEmpleado
     * @return \Illuminate\Http\Response
     */
    public function show(VentasEmpleado $ventasEmpleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VentasEmpleado  $ventasEmpleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados = Empleado::all();
        $ventasEmpleado = VentasEmpleado::findOrFail($id);    
        return view('ventasempleado.edit', compact('empleados', 'ventasEmpleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VentasEmpleado  $ventasEmpleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VentasEmpleado $ventasEmpleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VentasEmpleado  $ventasEmpleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VentasEmpleado::where('idventasempleado', '=', $id)->delete();
        return redirect('ventasempleado')->with('mensaje', 'Valor de la Venta Eliminado');
    }

    public function obtenerRegiones(VentasEmpleado $ventasEmpleado)
    {
        return DB::table('empleados')->where('idventasempleado', $ventasEmpleado -> idventasempleado)->get();
    }
}
