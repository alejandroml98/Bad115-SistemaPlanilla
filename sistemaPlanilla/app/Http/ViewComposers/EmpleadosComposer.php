<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Empleado;
use App\Puesto;

class EmpleadosComposer
{
    public function compose (View $view)
    {
        $empleados = Empleado::all();
        $puestos = Puesto::all();

        $view->with(['empleados' => $empleados, 'puestos' => $puestos]);
    }
}