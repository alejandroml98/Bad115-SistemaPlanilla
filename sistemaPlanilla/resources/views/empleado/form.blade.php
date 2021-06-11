@if (count($errors) > 0)
    <h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </h3>
@endif
@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
@extends('layouts.app')
@push('vendorcss')
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
@endpush
@section('content')
<div class="col-xs-12">
        
            <header class="panel-heading">
                <h2 class="panel-title">{{ $mode == 'create' ? 'Nuevo Empleado'  : 'Modificar Empleado' }}</h2>
            </header>
            <section class="panel">
            <div class="panel-body p-5">
<div class="row">

@if ($mode == 'create')

<div class="col-md-4 mb-3">
    <label for="codigoEmpleado" class="control-label">{{ 'Código' }}</label>
    <input type="text" name="codigoEmpleado" maxlength="7" required id="codigoEmpleadoCreate" value="{{ old('codigoEmpleadoCreate') }}"  data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Place your tooltip info here Tooltip" id="inputTooltip">
    </div>
    <div class="col-md-4 mb-3">
    <label for="primerNombre" class="control-label">{{ 'Primer Nombre' }}</label>
    <input type="text" name="primerNombre" id="primerNombreCreate" value="{{ old('primerNombreCreate') }}"  data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Place your tooltip info here Tooltip" id="inputTooltip">
    </div>
    <div class="col-md-4 mb-3">
    <label for="segundoNombre" class="control-label">{{ 'Segundo Nombre' }}</label>
    <input type="text" name="segundoNombre" id="segundoNombreCreate" value="{{ old('segundoNombreCreate') }}"  data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Place your tooltip info here Tooltip" id="inputTooltip" >
    </div>
</div>
<div class="row">
<div class="col-md-4 mb-3">
<label  for="apellidoPaterno" class="control-label">{{ 'Apellido Paterno' }}</label>
    <input type="text" name="apellidoPaterno" id="apellidoPaternoCreate" value="{{ old('apellidoPaternoCreate') }}" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Place your tooltip info here Tooltip" id="inputTooltip"  >
</div>
<div class="col-md-4 mb-3">
<label for="apellidoMaterno" class="control-label">{{ 'Apellido Materno' }}</label>
    <input type="text" name="apellidoMaterno" id="apellidoMaternoCreate" value="{{ old('apellidoMaternoCreate') }}" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Place your tooltip info here Tooltip" id="inputTooltip"  >
</div>
<div class="col-md-4 mb-3">
<label for="apellidoCasado"  class="control-label">{{ 'Apellido Casado' }}</label>
    <input type="text" name="apellidoCasado" id="apellidoCasadoCreate" value="{{ old('apellidoCasadoCreate') }}"  data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Place your tooltip info here Tooltip" id="inputTooltip">
</div>
</div>

<div class="row">
<div class="col-md-4 mb-3">
<label for="fechaNacimiento" class="control-label">{{ 'Fecha Nacimiento' }}</label>
    <input type="date" name="fechaNacimiento" id="fechaNacimientoCreate" value="{{ old('fechaNacimientoCreate') }}" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Place your tooltip info here Tooltip" id="inputTooltip" >

</div>
<div class="col-md-4 mb-3">
<label for="idDireccion" class="control-label">{{ 'Dirección' }}</label>
    <select data-plugin-selectTwo class="form-control populate" name="idDireccion" id="idDireccionCreate">
        <option value="" selected disabled>Seleccione una dirección</option>
        @foreach ($direcciones as $direccion)
        @foreach ($subRegiones as $subRegion)
        @if ($subRegion -> idsubregion == $direccion -> idsubregion)
        @foreach ($regiones as $region)
        @if ($region -> idregion == $subRegion -> idregion)
        @foreach ($paises as $pais)
        @if ($pais -> idpais == $region -> idpais)
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
<div class="col-md-4 mb-3">
<label for="idGenero">{{ 'Genero' }}</label>
    <select name="idGenero" id="idGenero" data-plugin-selectTwo class="form-control populate" >
        <option value="" selected disabled>Seleccione un genero</option>
        @foreach ($generos as $genero)
            <option value="{{ $genero -> idgenero }}">{{ $genero -> nombregenero }}</option>
        @endforeach
    </select>
</div>
</div>
<div class="row">
<div class="col-md-4 mb-3">
<label for="idEstadoCivil">{{ 'Estado Civil' }}</label>
    <select name="idEstadoCivil" id="idEstadoCivil" data-plugin-selectTwo class="form-control populate">
        <option value="" selected disabled>Seleccione un estado civil</option>
        @foreach ($estadosCiviles as $estadoCivil)
            <option value="{{ $estadoCivil -> idestadocivil }}">{{ $estadoCivil -> nombreestadocivil }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4 mb-3">
<label for="codigoPuesto">{{ 'Puesto' }}</label>
    <select name="codigoPuesto" id="codigoPuesto" data-plugin-selectTwo class="form-control populate">
        <option value="" selected disabled>Seleccione un puesto</option>
        @foreach ($puestos as $puesto)
            <option value="{{ $puesto -> codigopuesto }}">{{ $puesto -> nombrepuesto }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4 mb-3">
<label for="codigoEmpresa">{{ 'Empresa' }}</label>
    <select name="codigoEmpresa" id="codigoEmpresa" data-plugin-selectTwo class="form-control populate">    
        @foreach ($empresas as $empresa)
            <option value="{{ $empresa -> codigoempresa }}">{{ $empresa -> nombreempresa }}</option>
        @endforeach
    </select>
</div>
</div>
<div class="row">
<div class="col-md-4 mb-3">
<label for="salario">{{ 'Salario' }}</label>
    <input type="number" step=".01" min="0" max="9999999" name="salario" id="salarioCreate" value="{{ old('salarioCreate') }}" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Place your tooltip info here Tooltip" id="inputTooltip">
</div>
<div class="col-md-4 mb-3">

<label for="correoElectronico">{{ 'Correo Eléctronico' }}</label>
    <input type="email" name="correoElectronico" id="correoElectronicoCreate" value="{{ old('correoElectronicoCreate') }}" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Place your tooltip info here Tooltip" id="inputTooltip">
</div>
<div class="col-md-4 mb-3">
<label for="correoEmpresarial">{{ 'Correo Empresarial' }}</label>
    <input type="email" name="correoEmpresarial" id="correoEmpresarialCreate" value="{{ old('correoEmpresarialCreate') }}" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Place your tooltip info here Tooltip" id="inputTooltip">
</div>
</div>
<div class="row">
<div class="col-md-4 mb-3">
<label for="idUser">{{ 'Usuario' }}</label>
    <select name="idUser" id="idUser" data-plugin-selectTwo class="form-control populate">
        <option value="" selected disabled>Escoja un usuario para este empleado</option>
        @foreach ($usuarios as $usuario)
            <option value="{{ $usuario -> id }}">{{ $usuario -> name }} - {{ $usuario -> email }}</option>
        @endforeach
    </select> 
</div>
<div class="col-md-4 mb-3">
</div>
<div class="col-md-4 mb-3">
</div>
</div>

<div class="row">
<div class="col-md-4 mb-3">
</div>
<div class="col-md-4 mb-3">
</div>
<div class="col-md-4 mb-3">
</div>
</div>


    
 

   
  
@else
<input type="text" name="codigoEmpleadoAnterior" maxlength="7" required id="codigoEmpleadoAnterior" value="{{ isset($empleado -> codigoempleado) ? $empleado -> codigoempleado : old('codigoEmpleadoAnterior') }}">
</div>
<div class="col-md-4 mb-3">
<label for="codigoEmpleado">{{ 'Código' }}</label>
    <input type="text" name="codigoEmpleado" maxlength="7" required id="codigoEmpleado" value="{{ isset($empleado -> codigoempleado) ? $empleado -> codigoempleado : old('codigoEmpleado') }}">
</div>
<div class="col-md-4 mb-3">
<label for="primerNombre">{{ 'Primer Nombre' }}</label>
    <input type="text" name="primerNombre" id="primerNombre" value="{{ isset($empleado -> primernombre) ? $empleado -> primernombre : old('primerNombre') }}">
</div>
</div>

<div class="row">
<div class="col-md-4 mb-3">
<label for="segundoNombre">{{ 'Segundo Nombre' }}</label>
    <input type="text" name="segundoNombre" id="segundoNombre" value="{{ isset($empleado -> segundonombre) ? $empleado -> segundonombre : old('segundoNombre') }}">
</div>
<div class="col-md-4 mb-3">
<label for="apellidoPaterno">{{ 'Apellido Paterno' }}</label>
    <input type="text" name="apellidoPaterno" id="apellidoPaterno" value="{{ isset($empleado -> apellidopaterno) ? $empleado -> apellidopaterno : old('apellidoPaterno') }}">
</div>
<div class="col-md-4 mb-3">
<label for="apellidoMaterno">{{ 'Apellido Materno' }}</label>
    <input type="text" name="apellidoMaterno" id="apellidoMaterno" value="{{ isset($empleado -> apellidomaterno) ? $empleado -> apellidomaterno : old('apellidoMaterno') }}">
</div>
</div>

<div class="row">
<div class="col-md-4 mb-3">
<label for="apellidoCasado">{{ 'Apellido Casado' }}</label>
    <input type="text" name="apellidoCasado" id="apellidoCasado" value="{{ isset($empleado -> apellidocasado) ? $empleado -> apellidocasado : old('apellidoCasado') }}">
</div>
<div class="col-md-4 mb-3">
<label for="fechaNacimiento">{{ 'Fecha Nacimiento' }}</label>
    <input type="date" name="fechaNacimiento" id="fechaNacimiento" value="{{ isset($empleado -> fechanacimiento) ? $empleado -> fechanacimiento -> format('Y-m-d') : old('fechaNacimiento') }}">
</div>
<div class="col-md-4 mb-3">
<label for="idDireccion">{{ 'Dirección' }}</label>
    <select name="idDireccion" id="idDireccionCreate">
        @foreach ($direcciones as $direccion)        
        @foreach ($subRegiones as $subRegion)
        @if ($subRegion -> idsubregion == $direccion -> idsubregion)
        @foreach ($regiones as $region)
        @if ($region -> idregion == $subRegion -> idregion)
        @foreach ($paises as $pais)
        @if ($pais -> idpais == $region -> idpais)
        @if ($direccion -> iddireccion == $empleado -> iddireccion)
            <option value="{{ $direccion -> iddireccion }}" selected>{{ $pais -> nombrepais }}, {{ $region -> nombreregion }}, {{ $subRegion -> nombresubregion }}, {{ $direccion -> detalledireccion }}</option>
        @else
            <option value="{{ $direccion -> iddireccion }}">{{ $pais -> nombrepais }}, {{ $region -> nombreregion }}, {{ $subRegion -> nombresubregion }}, {{ $direccion -> detalledireccion }}</option>
        @endif        
        @endif
        @endforeach
        @endif
        @endforeach
        @endif
        @endforeach
        @endforeach
    </select>
</div>
</div>

<div class="row">
<div class="col-md-4 mb-3">

<label for="idGenero">{{ 'Genero' }}</label>
    <select name="idGenero" id="idGenero">        
        @foreach ($generos as $genero)
            @if ($empleado -> idgenero == $genero -> idgenero)
                <option value="{{ $genero -> idgenero }}" selected>{{ $genero -> nombregenero }}</option>
            @else
                <option value="{{ $genero -> idgenero }}">{{ $genero -> nombregenero }}</option>
            @endif            
        @endforeach
    </select>
</div>
<div class="col-md-4 mb-3">
<label for="idEstadoCivil">{{ 'Estado Civil' }}</label>
    <select name="idEstadoCivil" id="idEstadoCivil">        
        @foreach ($estadosCiviles as $estadoCivil)
        @if ($estadoCivil -> idestadocivil == $empleado -> idestadocivil)
            <option value="{{ $estadoCivil -> idestadocivil }}" selected>{{ $estadoCivil -> nombreestadocivil }}</option>
        @else
            <option value="{{ $estadoCivil -> idestadocivil }}">{{ $estadoCivil -> nombreestadocivil }}</option>
        @endif            
        @endforeach
    </select>
</div>
<div class="col-md-4 mb-3">
<label for="codigoPuesto">{{ 'Puesto' }}</label>
    <select name="codigoPuesto" id="codigoPuesto">        
        @foreach ($puestos as $puesto)
        @if ($empleado -> codigopuesto == $puesto -> codigopuesto)
            <option value="{{ $puesto -> codigopuesto }}" selected>{{ $puesto -> nombrepuesto }}</option>
        @else
            <option value="{{ $puesto -> codigopuesto }}">{{ $puesto -> nombrepuesto }}</option>
        @endif            
        @endforeach
    </select>
</div>
</div>

<div class="row">
<div class="col-md-4 mb-3">
<label for="codigoEmpresa">{{ 'Empresa' }}</label>
    <select name="codigoEmpresa" id="codigoEmpresa">    
        @foreach ($empresas as $empresa)
        @if ($empleado -> codigoempresa == $empresa -> codigoempresa)
            <option value="{{ $empresa -> codigoempresa }}" selected>{{ $empresa -> nombreempresa }}</option>
        @else
            <option value="{{ $empresa -> codigoempresa }}">{{ $empresa -> nombreempresa }}</option>
        @endif            
        @endforeach
    </select>
</div>
<div class="col-md-4 mb-3">
<label for="salario">{{ 'Salario' }}</label>
    <input type="number" step=".01" min="0" max="9999999" name="salario" id="salario" value="{{ isset($empleado -> salario) ? $empleado -> salario : old('salarioCreate') }}">
</div>
<div class="col-md-4 mb-3">
<label for="correoElectronico">{{ 'Correo Eléctronico' }}</label>
    <input type="email" name="correoElectronico" id="correoElectronico" value="{{ isset($empleado -> correoelectronico) ? $empleado -> correoelectronico : old('correoElectronico') }}">
</div>
</div>

<div class="row">
<div class="col-md-4 mb-3">
<label for="correoEmpresarial">{{ 'Correo Empresarial' }}</label>
    <input type="email" name="correoEmpresarial" id="correoEmpresarial" value="{{ isset($empleado -> correoempresarial) ? $empleado -> correoempresarial : old('correoEmpresarial') }}">
</div>
<div class="col-md-4 mb-3">
<label for="idUser">{{ 'Usuario' }}</label>
    <select name="idUser" id="idUser">        
        @foreach ($usuarios as $usuario)
            @if ($empleado -> iduser == $usuario -> id)
                <option value="{{ $usuario -> id }}" selected>{{ $usuario -> name }} - {{ $usuario -> email }}</option>
            @else
                <option value="{{ $usuario -> id }}">{{ $usuario -> name }} - {{ $usuario -> email }}</option>
            @endif            
        @endforeach
    </select>
</div>
<div class="col-md-4 mb-3">
</div>
</div>
    
   
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}" class="btn btn-success">
<a href="{{ url('/empleado/') }}">REGRESAR</a>
@endsection
@push('vendorjs')
<!-- Specific Page Vendor -->
<script src="{{ asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2_locale_es.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="js/profesion.js"></script>
@if (Session::has('mensaje'))
<script type="text/javascript">
    mostrarMensaje('{{ Session::get("mensaje") }}');
</script>
@endif
@endpush