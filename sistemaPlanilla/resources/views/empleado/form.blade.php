<header class="panel-heading">
    <div class="panel-actions">
		<a href="#" class="fa fa-caret-down"></a>
	</div>
    <h2 class="panel-title">{{ $mode == 'create' ? 'Nuevo Empleado'  : 'Modificar Datos Personales del Empleado' }}</h2>
</header>
<section class="panel">
    <div class="panel-body p-5">
        @if ($mode == 'create')
       
            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="control-label" for="codigoEmpleado">{{ 'Código' }}</label>
                    <input type="text" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="El codigo debe tener 2 letras y 5 numeros" name="codigoEmpleado" maxlength="7" required id="codigoEmpleado" value="{{ isset($empleado -> codigoempleado) ? $empleado -> codigoempleado : old('codigoEmpleado') }}">
                </div>
                <div class="col-md-8">
                    <label class="control-label" for="idUser">{{ 'Usuario' }}</label>
                    <select name="idUser" id="idUser" data-plugin-selectTwo class="form-control">
                        @foreach ($usuarios as $usuario)
                       
                        <option value="{{ $usuario -> id }}">{{ $usuario -> name }} - {{ $usuario -> email }}</option>
                        
                        @endforeach
                    </select>
                </div>                
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="primerNombre">{{ 'Primer Nombre' }}</label>
                    <input type="text" class="form-control" name="primerNombre" id="primerNombre" value="{{ isset($empleado -> primernombre) ? $empleado -> primernombre : old('primerNombre') }}">
                </div>
                <div class="col-md-6">
                    <label class="control-label" for="segundoNombre">{{ 'Segundo Nombre' }}</label>
                    <input type="text" class="form-control" name="segundoNombre" id="segundoNombre" value="{{ isset($empleado -> segundonombre) ? $empleado -> segundonombre : old('segundoNombre') }}">
                </div>                
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="control-label" for="apellidoPaterno">{{ 'Apellido Paterno' }}</label>
                    <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno" value="{{ isset($empleado -> apellidopaterno) ? $empleado -> apellidopaterno : old('apellidoPaterno') }}">
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="apellidoMaterno">{{ 'Apellido Materno' }}</label>
                    <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno" value="{{ isset($empleado -> apellidomaterno) ? $empleado -> apellidomaterno : old('apellidoMaterno') }}">
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="apellidoCasado">{{ 'Apellido Casado' }}</label>
                    <input type="text" class="form-control" name="apellidoCasado" id="apellidoCasado" value="{{ isset($empleado -> apellidocasado) ? $empleado -> apellidocasado : old('apellidoCasado') }}">
                </div>                
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="control-label" for="fechaNacimiento" class="control-label">{{ 'Fecha Nacimiento' }}</label>
                    <div class="input-group date">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input data-plugin-datepicker data-date-end-date="-18y" type="text" class="form-control" name="fechaNacimiento" id="fechaNacimientoCreate" value="{{ isset($empleado -> fechanacimiento) ? date('Y/m/d', strtotime($empleado -> fechanacimiento)) : old('fechaNacimientoCreate') }}">
                    </div>
                </div>                
                <div class="col-md-4">
                    <label class="control-label" for="idGenero">{{ 'Genero' }}</label>
                    <select name="idGenero" id="idGenero" data-plugin-selectTwo class="form-control mt-1">
                        @foreach ($generos as $genero)
                        
                        <option value="{{ $genero -> idgenero }}">{{ $genero -> nombregenero }}</option>
                    
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="idEstadoCivil">{{ 'Estado Civil' }}</label>
                    <select name="idEstadoCivil" id="idEstadoCivil" data-plugin-selectTwo class="form-control mt-1">
                        @foreach ($estadosCiviles as $estadoCivil)
                       
                        <option value="{{ $estadoCivil -> idestadocivil }}">{{ $estadoCivil -> nombreestadocivil }}</option>
                    
                        @endforeach
                    </select>
                </div>                
            </div>

            <div class="row mb-4">            
                <div class="col-md-4">
                    <label class="control-label" for="codigoEmpresa">{{ 'Empresa' }}</label>
                    <select name="codigoEmpresa" id="codigoEmpresa" class="form-control mt-1">
                        @foreach ($empresas as $empresa)
                       
                        <option value="{{ $empresa -> codigoempresa }}">{{ $empresa -> nombreempresa }}</option>
                    
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="codigoPuesto">{{ 'Puesto' }}</label>
                    <select onchange="rangoSalarial(this)" name="codigoPuesto" id="codigoPuesto" data-plugin-selectTwo class="form-control mt-1">
                        @foreach ($puestos as $puesto)                        
                        <option value="{{ $puesto -> codigopuesto }}">{{ $puesto -> nombrepuesto }}, 
                            ({{$puesto->rangoSalario->salariominimo}}-{{$puesto->rangoSalario->salariomaximo}})
                        </option>                        
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="salario">{{ 'Salario' }}</label>
                    <input type="number" class="form-control" step=".01" min="0" max="9999999" name="salario" id="salario" value="{{ isset($empleado -> salario) ? $empleado -> salario : old('salarioCreate') }}">
                </div>                
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="control-label" for="correoEmpresarial">{{ 'Correo Empresarial' }}</label>
                    <input type="email" class="form-control" name="correoEmpresarial" id="correoEmpresarial" value="{{ isset($empleado -> correoempresarial) ? $empleado -> correoempresarial : old('correoEmpresarial') }}">
                </div>
                <div class="col-md-6" hidden>
                    <label class="control-label" for="correoElectronico">{{ 'Correo Eléctronico' }}</label>
                    <input type="email" class="form-control" name="correoElectronico" id="correoElectronico" value="{{ isset($empleado -> correoelectronico) ? $empleado -> correoelectronico : old('correoElectronico') }}">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-9">
                    <label class="control-label" for="idDireccion">{{ 'Dirección' }}</label>
                    <select name="idDireccion" id="idDireccionCreate" data-plugin-selectTwo class="form-control mt-1">
                        @foreach ($direcciones as $direccion)
                            @foreach ($subRegiones as $subRegion)
                                @if ($subRegion -> idsubregion == $direccion -> idsubregion)
                                    @foreach ($regiones as $region)
                                        @if ($region -> idregion == $subRegion -> idregion)
                                            @foreach ($paises as $pais)
                                                @if ($pais -> idpais == $region -> idpais)
                                                <option value="{{ $direccion -> iddireccion }}" selected>{{ $pais -> nombrepais }}, {{ $region -> nombreregion }}, {{ $subRegion -> nombresubregion }}, {{ $direccion -> detalledireccion }}</option>
                                                    @else
                                                        <option value="{{ $direccion -> iddireccion }}">{{ $pais -> nombrepais }}, {{ $region -> nombreregion }}, {{ $subRegion -> nombresubregion }}, {{ $direccion -> detalledireccion }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 align-self-center mt-lg-4 pt-xs-1">
                    <a href="{{ url('/direccion/create') }}" class="btn btn-primary">
                        Agregar Direccion <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                </div> 
            </div>


        @else
            <input hidden type="text" name="codigoEmpleadoAnterior" maxlength="7" required id="codigoEmpleadoAnterior" value="{{ isset($empleado -> codigoempleado) ? $empleado -> codigoempleado : old('codigoEmpleadoAnterior') }}">
            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="control-label" for="codigoEmpleado">{{ 'Código' }}</label>
                    <input type="text" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="El codigo debe tener 2 letras y 5 numeros" name="codigoEmpleado" maxlength="7" required id="codigoEmpleado" value="{{ isset($empleado -> codigoempleado) ? $empleado -> codigoempleado : old('codigoEmpleado') }}">
                </div>
                <div class="col-md-8">
                    <label class="control-label" for="idUser">{{ 'Usuario' }}</label>
                    <select name="idUser" id="idUser" data-plugin-selectTwo class="form-control">
                        @foreach ($usuarios as $usuario)
                        @if ($empleado -> iduser == $usuario -> id)
                        <option value="{{ $usuario -> id }}" selected>{{ $usuario -> name }} - {{ $usuario -> email }}</option>
                        @else
                        <option value="{{ $usuario -> id }}">{{ $usuario -> name }} - {{ $usuario -> email }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>                
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="primerNombre">{{ 'Primer Nombre' }}</label>
                    <input type="text" class="form-control" name="primerNombre" id="primerNombre" value="{{ isset($empleado -> primernombre) ? $empleado -> primernombre : old('primerNombre') }}">
                </div>
                <div class="col-md-6">
                    <label class="control-label" for="segundoNombre">{{ 'Segundo Nombre' }}</label>
                    <input type="text" class="form-control" name="segundoNombre" id="segundoNombre" value="{{ isset($empleado -> segundonombre) ? $empleado -> segundonombre : old('segundoNombre') }}">
                </div>                
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="control-label" for="apellidoPaterno">{{ 'Apellido Paterno' }}</label>
                    <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno" value="{{ isset($empleado -> apellidopaterno) ? $empleado -> apellidopaterno : old('apellidoPaterno') }}">
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="apellidoMaterno">{{ 'Apellido Materno' }}</label>
                    <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno" value="{{ isset($empleado -> apellidomaterno) ? $empleado -> apellidomaterno : old('apellidoMaterno') }}">
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="apellidoCasado">{{ 'Apellido Casado' }}</label>
                    <input type="text" class="form-control" name="apellidoCasado" id="apellidoCasado" value="{{ isset($empleado -> apellidocasado) ? $empleado -> apellidocasado : old('apellidoCasado') }}">
                </div>                
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="control-label" for="fechaNacimiento" class="control-label">{{ 'Fecha Nacimiento' }}</label>
                    <div class="input-group date">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input data-plugin-datepicker data-date-end-date="-18y" type="text" class="form-control" name="fechaNacimiento" id="fechaNacimientoCreate" value="{{ isset($empleado -> fechanacimiento) ? date('Y/m/d', strtotime($empleado -> fechanacimiento)) : old('fechaNacimientoCreate') }}">
                    </div>
                </div>                
                <div class="col-md-4">
                    <label class="control-label" for="idGenero">{{ 'Genero' }}</label>
                    <select name="idGenero" id="idGenero" data-plugin-selectTwo class="form-control mt-1">
                        @foreach ($generos as $genero)
                        @if ($empleado -> idgenero == $genero -> idgenero)
                        <option value="{{ $genero -> idgenero }}" selected>{{ $genero -> nombregenero }}</option>
                        @else
                        <option value="{{ $genero -> idgenero }}">{{ $genero -> nombregenero }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="idEstadoCivil">{{ 'Estado Civil' }}</label>
                    <select name="idEstadoCivil" id="idEstadoCivil" data-plugin-selectTwo class="form-control mt-1">
                        @foreach ($estadosCiviles as $estadoCivil)
                        @if ($estadoCivil -> idestadocivil == $empleado -> idestadocivil)
                        <option value="{{ $estadoCivil -> idestadocivil }}" selected>{{ $estadoCivil -> nombreestadocivil }}</option>
                        @else
                        <option value="{{ $estadoCivil -> idestadocivil }}">{{ $estadoCivil -> nombreestadocivil }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>                
            </div>

            <div class="row mb-4">            
                <div class="col-md-4">
                    <label class="control-label" for="codigoEmpresa">{{ 'Empresa' }}</label>
                    <select name="codigoEmpresa" id="codigoEmpresa" class="form-control mt-1">
                        @foreach ($empresas as $empresa)
                        @if ($empleado -> codigoempresa == $empresa -> codigoempresa)
                        <option value="{{ $empresa -> codigoempresa }}" selected>{{ $empresa -> nombreempresa }}</option>
                        @else
                        <option value="{{ $empresa -> codigoempresa }}">{{ $empresa -> nombreempresa }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="codigoPuesto">{{ 'Puesto' }}</label>
                    <select onchange="rangoSalarial(this)" name="codigoPuesto" id="codigoPuesto" data-plugin-selectTwo class="form-control mt-1">
                        @foreach ($puestos as $puesto)
                        @if ($empleado -> codigopuesto == $puesto -> codigopuesto)
                        <option value="{{ $puesto -> codigopuesto }}" selected>{{ $puesto -> nombrepuesto }}, 
                            ({{$puesto->rangoSalario->salariominimo}}-{{$puesto->rangoSalario->salariomaximo}})</option>
                        @else
                        <option value="{{ $puesto -> codigopuesto }}">{{ $puesto -> nombrepuesto }}, 
                            ({{$puesto->rangoSalario->salariominimo}}-{{$puesto->rangoSalario->salariomaximo}})</option>
                        @endif
                        @endforeach
                    </select>                    
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="salario">{{ 'Salario' }}</label>
                    <input type="number" class="form-control" step="5" min="0" max="9999999" name="salario" id="salario" value="{{ isset($empleado -> salario) ? $empleado -> salario : old('salarioCreate') }}">
                </div>                
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="control-label" for="correoEmpresarial">{{ 'Correo Empresarial' }}</label>
                    <input type="email" class="form-control" name="correoEmpresarial" id="correoEmpresarial" value="{{ isset($empleado -> correoempresarial) ? $empleado -> correoempresarial : old('correoEmpresarial') }}">
                </div>
                <div class="col-md-6">
                    <label class="control-label" for="correoElectronico">{{ 'Correo Eléctronico' }}</label>
                    <input type="email" class="form-control" name="correoElectronico" id="correoElectronico" value="{{ isset($empleado -> correoelectronico) ? $empleado -> correoelectronico : old('correoElectronico') }}">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-9">
                    <label class="control-label" for="idDireccion">{{ 'Dirección' }}</label>
                        @foreach ($direcciones as $direccion)
                            @foreach ($subRegiones as $subRegion)
                                @if ($subRegion -> idsubregion == $direccion -> idsubregion)
                                    @foreach ($regiones as $region)
                                        @if ($region -> idregion == $subRegion -> idregion)
                                            @foreach ($paises as $pais)
                                                @if ($pais -> idpais == $region -> idpais)
                                                    @if ($direccion -> iddireccion == $empleado -> iddireccion)
                                                        <input hidden value="{{ $empleado -> iddireccion }}" name="idDireccion">
                                                        <input disabled type="text" class="form-control" value="{{ $pais -> nombrepais }}, {{ $region -> nombreregion }}, {{ $subRegion -> nombresubregion }}, {{ $direccion -> detalledireccion }}">
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach
                </div>
                <div class="col-md-3 align-self-center mt-lg-4 pt-xs-1">
                    <a href="{{ url('/direccion/'.$empleado -> iddireccion.'/edit') }}" class="btn btn-primary">
                        Editar Direccion <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                </div> 
            </div>

        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger mt-2" role="alert" id="{{'error'.Session::get('peticion')}}">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row ml-1 pt-4">
            <div class="form-group">
                <input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}" class="btn btn-primary">
                <a class="btn btn-danger" href="{{ url('/empleado/') }}">Cancelar</a>
            </div>
        </div>
    </div>
</section>