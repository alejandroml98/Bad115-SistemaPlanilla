<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Direccion;
use App\Pais;
use App\Region;
use App\SubRegion;

class DireccionesComposer
{
    public function compose (View $view)
    {
        $subRegiones = SubRegion::all();
        $regiones = Region::all();
        $paises = Pais::all();
        $direcciones = Direccion::all();

        $view->with(['direcciones' => $direcciones, 'paises' => $paises, 'regiones' => $regiones, 'subRegiones' => $subRegiones]);
    }
}