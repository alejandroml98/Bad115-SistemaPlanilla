@if (Session::has('mensaje')){{
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
@endif

<h1>Cambiar Información de cuenta</h1>
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
</form>