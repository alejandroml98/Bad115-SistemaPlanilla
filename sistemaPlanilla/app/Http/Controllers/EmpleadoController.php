<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\User;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }

    public function activar(User $user)
    {
        $user->activo=true;
        $user->save();
        dd($user);
    }

    public function desactivar(User $user)
    {
        $user->activo=false;
        $user->save();
        dd($user->name);
    }

    public function pedirActivacion(Request $request)
    {
        $user= Auth::User();
        //Solicitar proceso de activacion por correo
        $data = array('name'=>$user->name, 'explicacion'=>$explicacion);
        //Para enviar correo de confirmacion de nuevo
        Mail::send('Mail.evaluacionFase1', $data, function ($message) use ($data){
            $message->to("admin@gmail.com", "Admin");
            $message->subject('Proceso de reactivación de cuenta');            
        });
        dd($user);
    }    
}
