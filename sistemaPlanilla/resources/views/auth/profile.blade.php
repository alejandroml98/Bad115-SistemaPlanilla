<!-- @if (Session::has('mensaje')){{
    Session::get('mensaje')
}}
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
@endif
<h1>Bienvenid@ a tu perfil {{ $user -> name }}</h1>
@if (isset($empleado->codigoempleado))
    <h2>Información del empleado: </h2>
    <a href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}" class="btn btn-warning">Editar Información del empleado</a>
    <p>Código Empleado: {{ $empleado -> codigoempleado }}</p>
    <p>Nombre: {{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}</p>
    <p>Fecha de Nacimiento: {{ $empleado -> fechanacimiento }}</p>
    <p>Genero: {{ $genero -> nombregenero }}</p>
    <p>Estado Civil: {{ $estadoCivil -> nombreestadocivil }}</p>
    <p>Puesto: {{ $puesto -> nombrepuesto }}</p>
    <p>Dirección: {{ $pais -> nombrepais }}, {{ $region -> nombreregion }}, {{ $subRegion -> nombresubregion }}, {{ $direccion -> detalledireccion }}</p>                
    <p>Correo Electrónico: {{ $empleado -> correoelectronico }}</p>
    <p>Correo Empresarial: {{ $empleado -> correoempresarial }}</p>
    <h3>Unidades en las que se encuentra - Jefe</h3>
    @foreach ($unidades as $unidad)
        @foreach ($jefes as $j)
            @foreach ($empleadosJefes as $ej)
                @if ($unidad -> codigounidad == $j -> codigounidad && $j -> codigoempleado == $ej -> codigoempleado)
                    @if ($empleado -> codigoempleado == $ej -> codigoempleado)
                        <p>{{ $unidad -> nombreunidad }} - Usted es el jefe</p>
                        <p><a href="{{ url('/profile/subordinados/'.$empleado -> codigoempleado) }}">Ver subordinados</a></p>    
                    @else
                        <p>{{ $unidad -> nombreunidad }} - {{ $ej -> primernombre }}{{ ' ' }}{{ $ej -> apellidopaterno }}</p>                        
                    @endif
                @endif
            @endforeach        
        @endforeach        
    @endforeach
@else
    <h2>No tiene un empleado asociado a esta cuenta, puede facilmente crear un empleado haciendo clic <a href="{{ url('/empleado/create') }}">aquí</a></h2>
@endif -->

<!-- <h1>Cambiar Información de cuenta</h1>
<form action="{{ url('/profile/update') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input type="text" hidden name="id" id="id" value="{{ $user -> id }}">
    <label for="name">{{ 'Nombre del usuario' }}</label>
    <input type="text" name="name" id="name" value="{{ $user -> name }}">
    <label for="email">{{ 'Nombre del usuario' }}</label>
    <input type="text" name="email" id="email" value="{{ $user -> email }}">
    <input type="submit" value="Cambiar Informacion del Usuario">
</form>
<h1>Cambiar contraseña</h1>
<form action="{{ url('/profile/changePassword') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input type="text" hidden name="id" id="id" value="{{ $user -> id }}">
    <label for="currentPassword">{{ 'Constraseña Actual: ' }}</label>
    <input type="text" type="password" name="currentPassword" id="currentPassword">
    <label for="newPassword">{{ 'Nueva Contraseña: ' }}</label>
    <input type="text" type="password" name="newPassword" id="newPassword">
    <label for="confirmNewPassword">{{ 'Confirmar Nueva Contraseña: ' }}</label>
    <input type="text" type="password" name="confirmNewPassword" id="confirmNewPassword">
    <input type="submit" value="Cambiar Contraseña"> 
</form> -->

<!--dsfsf--->


@extends('layouts.app')
@section('content')
@if (count($errors) > 0)
       
       <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li >
                    {{ $error }}
                </li>
            @endforeach
        </ul>
        </div>
@endif
@if (isset($empleado->codigoempleado))
<div class="container">
    <div class="main-body">
          
          <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
     <title>profile with data and skills - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="main-body">
    

 
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                   
                      <h4>{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}</p></h4>
                      <p>{{ $puesto -> nombrepuesto }}</p>
                      <p class=" mb-1"><strong>Estado Civil</strong></p>
                      <p class="text-secondary mb-1">{{ $estadoCivil -> nombreestadocivil }}</p>
                      <p class=" mb-1"><strong>Genero</strong></p>
                      <p class="text-secondary mb-1">{{ $genero -> nombregenero }}</p>
                      <p class=" mb-1"><strong>Nacimiento</strong></p>
                      <p class="text-muted font-size-sm">{{ $empleado -> fechanacimiento }}</p>
                     
                    </div>
                  </div>
                </div>
              </div>
           
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">UNIDAD | SUPERIOR</h6>
                   
                  </li>
                  <hr>
                  @foreach ($unidades as $unidad)
        @foreach ($jefes as $j)
            @foreach ($empleadosJefes as $ej)
                @if ($unidad -> codigounidad == $j -> codigounidad && $j -> codigoempleado == $ej -> codigoempleado)
                    @if ($empleado -> codigoempleado == $ej -> codigoempleado)
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">{{ $unidad -> nombreunidad }} - Usted es el jefe</h6>
                    <span class="text-secondary"><a href="{{ url('/profile/subordinados/'.$empleado -> codigoempleado) }}">Ver subordinados</a></span>
                  </li>
                     
                      
                    @else
                    <h6 class="mb-0">{{ $unidad -> nombreunidad }} - {{ $ej -> primernombre }}{{ ' ' }}{{ $ej -> apellidopaterno }}</h6>
                        <p></p>                        
                    @endif
                    <hr>
                @endif
            @endforeach        
        @endforeach        
    @endforeach
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nombre</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Correo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $empleado -> correoelectronico }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Correo Empresarial</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $empleado -> correoempresarial }}
                    </div>
                  </div>
                  <hr>
                 
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Dirección</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $pais -> nombrepais }}, {{ $region -> nombreregion }}, {{ $subRegion -> nombresubregion }}, {{ $direccion -> detalledireccion }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}" >Editar Información</a>
                    </div>
                  </div>
                </div>
              </div>


              <div class="row gutters-sm">
              
        <div class="col-sm-6 mb-3">
           <div class="card h-100">
            <form action="{{ url('/profile/update') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                   {{ method_field('PUT') }}
                   <input type="text" hidden name="id" id="id" value="{{ $user -> id }}">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">Cambiar Información</h6>
                      <div class="form-group">
                        <label for="name">{{'Nombre de usuario'}}</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user -> name }}" >
                       
                      </div>
                      <hr>
                      <div class="form-group">
                        <label for="email">{{"Email"}} </label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user -> email }}">
                        
                      </div>
                       <hr>
                      <input  class="btn btn-info" type="submit" value="Cambiar Informacion del Usuario">
                    </div>
              </form>
            </div>
  
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                  <form action="{{ url('/profile/changePassword') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                   {{ method_field('PUT') }}
                  
                    <div class="card-body">
                    <input type="text" hidden name="id" id="id" value="{{ $user -> id }}">
                      <h6 class="d-flex align-items-center mb-3">Cambiar Clave</h6>
                      <div class="form-group">
                        <label for="currentPassword">{{'Contraseña Actual'}}</label>
                        <input type="text" class="form-control" name="currentPassword" id="currentPassword" >
                        
                      </div>
                      <hr>
                      <div class="form-group">
                        <label for="email">{{"Nueva Contraseña"}} </label>
                        <input type="password" class="form-control" name="newPassword" id="newPassword">
                      
                      </div>
                       <hr>
                       <div class="form-group">
                        <label for="email">{{"Confirmar Contraseña"}} </label>
                        <input type="password" class="form-control"  name="confirmNewPassword" id="confirmNewPassword">
                       
                      </div>
                      <hr>
                      <input  class="btn btn-info" type="submit" value="Cambiar Informacion del Usuario">
                    </div>
              </form>
                </div>
              </div>



            </div>
          </div>

        </div>
    </div>
    @else
    <div class="alert alert-info">
<h2> No tiene un empleado asociado a esta cuenta, puede facilmente crear un empleado haciendo clic <a href="{{ url('/empleado/create') }}">aquí</a</h2>
</div>
  
@endif 
    @endsection
<style type="text/css">
body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

</style>

<script type="text/javascript">

</script>
</body>
</html>