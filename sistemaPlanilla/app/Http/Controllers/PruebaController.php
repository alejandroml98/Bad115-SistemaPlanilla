<?php

namespace App\Http\Controllers;

use App\Prueba;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view ('form');
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
     * @param  \App\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function show(Prueba $prueba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function edit(Prueba $prueba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prueba $prueba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prueba $prueba)
    {
        //
    }
    public function Confirmacion()
    {
        // example:
        //return('Eliminado');       
        
        
        //Tooast de exito        
        toast('Your Post has been deleted!','success');

        //Toast de error
        //toast('Your Post could not be deleted!','error');
        
        //alert()->question('Are you sure?','You won\'t be able to revert this!')->showCancelButton()->showConfirmButton()->focusConfirm(true);
        return redirect('casita');
    }
}
