<?php

namespace App\Http\Controllers;
use App\Pais;
use App\Region;
use App\SubRegion;
use App\Prueba;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
       
        $subRegiones = SubRegion::all();
        $regiones = Region::all();
        $paises = Pais::all();
        return view('roles.index', compact('paises', 'regiones', 'subRegiones'));
       // $user->assignRole('writer');
        
    }

    public function index2()
    {
        //
        return view ('layouts.app');
    }

    public function indexProfile()
    {
        //
        if(Auth::user()->activo==1){
            try {
                $result= DB::select(
                    'call update_salary(?)', array(3)          
                );
            } catch (\Throwable $th) {
                //throw $th;
            }
            
            //DB::raw("call update_salary(:idrango)", array('idrango'=>3));
            dd('activo');
        }
        dd('inactivo');
        return view ('auth.profile');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('roles/create');
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