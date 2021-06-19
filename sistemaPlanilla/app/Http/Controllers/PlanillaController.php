<?php

namespace App\Http\Controllers;

use App\CentroCostos;
use App\Empleado;
use App\TipoDescuento;
use App\TipoDescuento_Empleado;
use App\TipoIngreso;
use App\TipoIngresos_Empleado;
use App\Unidad;
use App\Unidad_CentroCostos;
use App\UnidadEmpleado;
use Illuminate\Http\Request;

class PlanillaController extends Controller
{
    public function listaUnidadesPrincipales(){
        $unidadesPrincipales = Unidad::where('codigounidadantecesora', '=', null)->get();
        return view('planilla.unidades', compact('unidadesPrincipales'));
    }

    public function generarPlanilla($codigounidad){

        $unidad = Unidad::where('codigounidad', '=', $codigounidad)->first();
        $unidadCentroCosto = Unidad_CentroCostos::where('codigounidad', '=', $codigounidad)->first();
        $centroCosto = CentroCostos::where('idcentrocostos', '=', $unidadCentroCosto -> idcentrocostos)->first();
        $totalAPagarUnidad = 0;
        $totalSalarios = 0;

        $empleados = UnidadEmpleado::where('codigounidad', '=', $codigounidad)->get(); //Todos los empleados        
        $totalEmpleados = $empleados -> count();

        //Está será la variable más importante, tendrá y se organizará de la siguiente manera, será un array:
        //[codigoEmpleado, salario, [Descuentos Agrupados], totalDescuentos, [Ingresos Agrupados], totalIngresos, salarioNeto]
        $planilla = array();

        $tipoIngresos = TipoIngreso::all(); //Para poder agrupar por tipo ingreso
        $totalTipoIngresos = array_fill(0, $tipoIngresos -> count(), 0); //Para llevar el total de todos los tipos de Ingresos
        $totalIngresos = 0;//Total de todos los ingresos
        $tipoDescuentos = TipoDescuento::all();//lo mismo con descuentos
        $totalTipoDescuentos = array_fill(0, $tipoDescuentos -> count(), 0); //Para llevar el total de todos los tipos de Descuentos
        $totalDescuentos = 0;//Total de todos los descuentos
        //Para recorrer todos los empleados de la unidad
        foreach ($empleados as $emp) {

            $e = Empleado::where('codigoempleado','=', $emp -> codigoempleado)->first();            
            //Primer paso obtener el salario fijo del empleado
            $salario = Empleado::where('codigoempleado', '=', $emp -> codigoempleado)->first()->salario;

            //Ahora declaremos unas variables para los totales
            $totalDescuentosEmpleadoActual = 0;
            $totalIngresosEmpleadoActual = 0;

            //PARA DESCUENTOS POR EMPLEADO        
            //Para guardar agrupados los descuentos, si no tiene pues simplemente dejarle 0, por eso es de 
            //tamaño n tiposdescuentos e inicializado con 0
            $totalDescuentosEmpleado = array_fill(0, $tipoDescuentos -> count(), 0);

            $n = 0;
            //recorramos los tipos de descuento para encontrar los totales de cada uno por empleado
            foreach ($tipoDescuentos as $descuento){
                //Aquí buscamos todos los descuentos del empleado actual
                $descuentoEmpleado = TipoDescuento_Empleado::where([
                    ['codigoempleado', '=', $emp -> codigoempleado],
                    ['idTipoDescuento', '=', $descuento -> idtipodescuento ]
                ])->get();
                //Agrupando por tipo descuento
                foreach($descuentoEmpleado as $d) {
                    //Vamos 1 por 1 agrupando
                    if($d -> idtipodescuento == $descuento -> idtipodescuento) {
                        //Sumamos al total agrupado de descuentos
                        $totalDescuentosEmpleado[$n] += $d -> valortipodescuentoempleado;
                        //Sumamos al total de el tipo descuentos global
                        $totalTipoDescuentos[$n] += $d -> valortipodescuentoempleado;
                        //Sumamos al total de descuentos del empleado sin agrupar
                        $totalDescuentosEmpleadoActual += $d -> valortipodescuentoempleado;
                        //Sumamos al total de descuentos global sin agrupar
                        $totalDescuentos += $d -> valortipodescuentoempleado;
                    }
                }
                $n++;
            }            

            //PARA INGRESOS            
            //Para guardar agrupados los ingresos, si no tiene pues simplemente dejarle 0, por eso es de 
            //tamaño n tipoIngresos e inicializado con 0
            $totalIngresosEmpleado = array_fill(0, $tipoIngresos -> count(), 0);

            $n = 0;
            //Recorremos los tipoIngresos para así poder agruparlos por tipo
            foreach ($tipoIngresos as $ingreso) {
                //Aquí buscamos todos los descuentos del empleado actual
                $ingresoEmpleado = TipoIngresos_Empleado::where([
                    ['codigoempleado', '=', $emp -> codigoempleado],
                    ['idTipoIngresos', '=', $ingreso -> idtipoingresos ]
                ])->get();
                //Agrupando por tipo ingreso
                foreach($ingresoEmpleado as $i) {
                    //Vamos 1 por 1 agrupando
                    if($i -> idtipoingresos == $ingreso -> idtipoingresos) {
                        //Sumamos al total agrupado de ingresos
                        $totalIngresosEmpleado[$n] += $i -> valotipoingresoempleado;
                        //Sumamos al total de el tipo ingresos global
                        $totalTipoIngresos[$n] += $d -> valortipodescuentoempleado;
                        //Sumamos al total de ingresos del empleado sin agrupar
                        $totalIngresosEmpleadoActual += $i -> valotipoingresoempleado;
                        //Sumamos al total de ingresos global sin agrupar
                        $totalIngresos += $d -> valortipodescuentoempleado;
                    }
                }
                $n++;
            }            

            $salarioNetoEmpleado = $salario + $totalIngresosEmpleadoActual - $totalDescuentosEmpleadoActual;
            $totalSalarios += $salario;

            $planillaEmpleadoActual = array();
            array_push($planillaEmpleadoActual, $e -> codigoempleado);
            array_push($planillaEmpleadoActual, $e -> primernombre.' '.$e -> apellidopaterno);
            array_push($planillaEmpleadoActual, $salario);
            array_push($planillaEmpleadoActual, $totalDescuentosEmpleado);
            array_push($planillaEmpleadoActual, $totalDescuentosEmpleadoActual);
            array_push($planillaEmpleadoActual, $totalIngresosEmpleado);
            array_push($planillaEmpleadoActual, $totalIngresosEmpleadoActual);
            array_push($planillaEmpleadoActual, $salarioNetoEmpleado);

            $totalAPagarUnidad += $salarioNetoEmpleado;

            array_push($planilla, $planillaEmpleadoActual);
        }
        return view('planilla.planilla', compact(
            'planilla', 'tipoIngresos', 'totalTipoIngresos', 'totalIngresos', 'totalSalarios', 'unidad',
            'tipoDescuentos', 'totalTipoDescuentos', 'totalDescuentos', 'totalAPagarUnidad', 'totalEmpleados'
        ));
        //Validar si el total a pagar de todos los empleados de la unidad no sobrepasa el presupuesto
        /*if ($totalAPagarUnidad <= $centroCosto -> presupuestoinicial) {
            dd("Si les podes pagar");
        } else {
            dd("NO les podes pagar");
        }*/
    }
}
