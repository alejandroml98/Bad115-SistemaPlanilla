<?php

namespace App\Http\Controllers;

use App\Direccion;
use App\Empleado;
use App\EstadoCivil;
use App\Genero;
use App\Pais;
use App\Puesto;
use App\Region;
use App\SubRegion;
use App\Unidad;
use App\UnidadEmpleado;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(){
        $user = Auth::user();
        $empleado = Empleado::where('iduser', '=', $user->id)->get()->first();
        if(isset($empleado -> codigoempleado)){
            $genero = Genero::where('idgenero', '=', $empleado -> idgenero)->first();
            $estadoCivil = EstadoCivil::where('idestadocivil', '=', $empleado -> idestadocivil)->first();
            $puesto = Puesto::where('codigopuesto', '=', $empleado -> codigopuesto)->first();
            $direccion = Direccion::where('iddireccion','=',$empleado -> iddireccion)->first();
            $subRegion = SubRegion::where('idsubregion','=',$direccion -> idsubregion)->first();
            $region = Region::where('idregion','=',$subRegion -> idregion)->first();
            $pais = Pais::where('idpais','=',$region -> idpais)->first();
            $unidadesEmpleados = UnidadEmpleado::where('codigoempleado','=',$empleado -> codigoempleado)->get();
            $unidades = collect();
            $jefes = collect();
            foreach($unidadesEmpleados as $ue){
                $unidades -> push(Unidad::where('codigounidad','=',$ue -> codigounidad)->first());                
            }
            foreach(UnidadEmpleado::all() as $ue) {
                if($ue -> esjefe){
                    $jefes -> push($ue);
                }
            }
            $empleadosJefes = collect();
            foreach($jefes as $jefe){
                $empleadosJefes -> push(Empleado::where('codigoempleado','=',$jefe -> codigoempleado)->first());
            }            
            return view('auth.profile', 
            compact('user', 'empleado', 'direccion', 'subRegion', 'region', 'pais'
            ,'genero', 'estadoCivil', 'puesto', 'unidades', 'jefes','empleadosJefes'));
        }
        return view('auth.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $campos = [
            'name' => ['required','string', 'max:100', 'regex:/^[a-zA-Zá-úÁ-Ú ]*$/'],
            'email' => ['required', 'string', 'unique:users,email,' . Auth::user()->id]
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya <existe></existe>'
        ];
        $this->validate($request, $campos, $mensaje);
        $user = request()->except(['_token', '_method']);
        User::where('id', '=', $request['id'])->update($user);
        return redirect('profile')->with('mensaje', 'Usuario Modificado');
    }

    public function changePassword(Request $request)
    {
        $campos = [
            'currentPassword' => ['required','string', 'min:8'],
            'newPassword' => ['required','string', 'min:8'],
            'confirmNewPassword' => ['same:newPassword']
        ];
        $mensaje = [
            "required" => 'El :attribute es requerido',
            "regex" => 'El :attribute no acepta números o caracteres especiales',
            "unique" => 'El :attribute que escribió ya existe'
        ];
        $this->validate($request, $campos, $mensaje);        
        if(Hash::check($request->currentPassword, auth()->user()->password)){
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request['newPassword'])]);
            return redirect('profile')->with('mensaje', 'Contraseña Cambiada');
        } else {
            return redirect('profile')->with('mensaje', 'Introduzca la contraseña actual correctamente');
        }             
    }

    public function obtenerSubordinados($codigoempleado){
        $unidadEmpleado = UnidadEmpleado::where('codigoempleado','=',$codigoempleado)->first();
        $unidadesEmpleados = UnidadEmpleado::where([['codigounidad','=',$unidadEmpleado -> codigounidad], ['esjefe','=',"0"]])->get();
        $subordinados = array();
        foreach (Empleado::all() as $u) {
            foreach($unidadesEmpleados as $ue){
                if($ue -> codigoempleado == $u -> codigoempleado){
                    array_push($subordinados, $u);
                }
            }
        }
        $puestos = Puesto::all();
        $unidad = Unidad::where('codigounidad','=',$unidadEmpleado -> codigounidad)->first();
        $empleado = Empleado::where('codigoempleado','=',$codigoempleado)->first();
        return view ('auth.subordinados', compact('subordinados', 'unidad', 'empleado', 'puestos'));
    }
}
