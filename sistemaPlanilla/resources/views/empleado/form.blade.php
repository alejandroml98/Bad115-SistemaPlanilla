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
<h2>{{ $mode == 'create' ? 'Agregar Empleado'  : 'Modificar Empleado' }}</h2>
@if ($mode == 'create')
    <label for="codigoEmpleado">{{ 'Código' }}</label>
    <input type="text" name="codigoEmpleado" maxlength="7" required id="codigoEmpleadoCreate" value="{{ old('codigoEmpleadoCreate') }}">
    <label for="primerNombre">{{ 'Primer Nombre' }}</label>
    <input type="text" name="primerNombre" id="primerNombreCreate" value="{{ old('primerNombreCreate') }}">
    <label for="segundoNombre">{{ 'Segundo Nombre' }}</label>
    <input type="text" name="segundoNombre" id="segundoNombreCreate" value="{{ old('segundoNombreCreate') }}">
    <label for="apellidoPaterno">{{ 'Apellido Paterno' }}</label>
    <input type="text" name="apellidoPaterno" id="apellidoPaternoCreate" value="{{ old('apellidoPaternoCreate') }}">
    <label for="apellidoMaterno">{{ 'Apellido Materno' }}</label>
    <input type="text" name="apellidoMaterno" id="apellidoMaternoCreate" value="{{ old('apellidoMaternoCreate') }}">
    <label for="apellidoCasado">{{ 'Apellido Casado' }}</label>
    <input type="text" name="apellidoCasado" id="apellidoCasadoCreate" value="{{ old('apellidoCasadoCreate') }}">
    <label for="fechaNacimiento">{{ 'Fecha Nacimiento' }}</label>
    <input type="date" name="fechaNacimiento" id="fechaNacimientoCreate" value="{{ old('fechaNacimientoCreate') }}">
    <label for="idDireccion">{{ 'Dirección' }}</label>
    <select name="idDireccion" id="idDireccionCreate">
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
    <label for="idGenero">{{ 'Genero' }}</label>
    <select name="idGenero" id="idGenero">
        <option value="" selected disabled>Seleccione un genero</option>
        @foreach ($generos as $genero)
            <option value="{{ $genero -> idgenero }}">{{ $genero -> nombregenero }}</option>
        @endforeach
    </select>
    <label for="idEstadoCivil">{{ 'Estado Civil' }}</label>
    <select name="idEstadoCivil" id="idEstadoCivil">
        <option value="" selected disabled>Seleccione un estado civil</option>
        @foreach ($estadosCiviles as $estadoCivil)
            <option value="{{ $estadoCivil -> idestadocivil }}">{{ $estadoCivil -> nombreestadocivil }}</option>
        @endforeach
    </select>
    <label for="codigoPuesto">{{ 'Puesto' }}</label>
    <select name="codigoPuesto" id="codigoPuesto">
        <option value="" selected disabled>Seleccione un puesto</option>
        @foreach ($puestos as $puesto)
            <option value="{{ $puesto -> codigopuesto }}">{{ $puesto -> nombrepuesto }}</option>
        @endforeach
    </select>
    <label for="codigoEmpresa">{{ 'Empresa' }}</label>
    <select name="codigoEmpresa" id="codigoEmpresa">    
        @foreach ($empresas as $empresa)
            <option value="{{ $empresa -> codigoempresa }}">{{ $empresa -> nombreempresa }}</option>
        @endforeach
    </select>
    <label for="salario">{{ 'Salario' }}</label>
    <input type="number" step=".01" min="0" max="9999999" name="salario" id="salarioCreate" value="{{ old('salarioCreate') }}">
    <label for="correoElectronico">{{ 'Correo Eléctronico' }}</label>
    <input type="email" name="correoElectronico" id="correoElectronicoCreate" value="{{ old('correoElectronicoCreate') }}">
    <label for="correoEmpresarial">{{ 'Correo Empresarial' }}</label>
    <input type="email" name="correoEmpresarial" id="correoEmpresarialCreate" value="{{ old('correoEmpresarialCreate') }}">
    <label for="idUser">{{ 'Usuario' }}</label>
    <select name="idUser" id="idUser">
        <option value="" selected disabled>Escoja un usuario para este empleado</option>
        @foreach ($usuarios as $usuario)
            <option value="{{ $usuario -> id }}">{{ $usuario -> name }} - {{ $usuario -> email }}</option>
        @endforeach
    </select>  
@else
    <input type="text" name="codigoEmpleadoAnterior" maxlength="7" required id="codigoEmpleadoAnterior" value="{{ isset($empleado -> codigoempleado) ? $empleado -> codigoempleado : old('codigoEmpleadoAnterior') }}">
    <label for="codigoEmpleado">{{ 'Código' }}</label>
    <input type="text" name="codigoEmpleado" maxlength="7" required id="codigoEmpleado" value="{{ isset($empleado -> codigoempleado) ? $empleado -> codigoempleado : old('codigoEmpleado') }}">
    <label for="primerNombre">{{ 'Primer Nombre' }}</label>
    <input type="text" name="primerNombre" id="primerNombre" value="{{ isset($empleado -> primernombre) ? $empleado -> primernombre : old('primerNombre') }}">
    <label for="segundoNombre">{{ 'Segundo Nombre' }}</label>
    <input type="text" name="segundoNombre" id="segundoNombre" value="{{ isset($empleado -> segundonombre) ? $empleado -> segundonombre : old('segundoNombre') }}">
    <label for="apellidoPaterno">{{ 'Apellido Paterno' }}</label>
    <input type="text" name="apellidoPaterno" id="apellidoPaterno" value="{{ isset($empleado -> apellidopaterno) ? $empleado -> apellidopaterno : old('apellidoPaterno') }}">
    <label for="apellidoMaterno">{{ 'Apellido Materno' }}</label>
    <input type="text" name="apellidoMaterno" id="apellidoMaterno" value="{{ isset($empleado -> apellidomaterno) ? $empleado -> apellidomaterno : old('apellidoMaterno') }}">
    <label for="apellidoCasado">{{ 'Apellido Casado' }}</label>
    <input type="text" name="apellidoCasado" id="apellidoCasado" value="{{ isset($empleado -> apellidocasado) ? $empleado -> apellidocasado : old('apellidoCasado') }}">
    <label for="fechaNacimiento">{{ 'Fecha Nacimiento' }}</label>
    <input type="date" name="fechaNacimiento" id="fechaNacimiento" value="{{ isset($empleado -> fechanacimiento) ? $empleado -> fechanacimiento -> format('Y-m-d') : old('fechaNacimiento') }}">
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
    <label for="salario">{{ 'Salario' }}</label>
    <input type="number" step=".01" min="0" max="9999999" name="salario" id="salario" value="{{ isset($empleado -> salario) ? $empleado -> salario : old('salarioCreate') }}">
    <label for="correoElectronico">{{ 'Correo Eléctronico' }}</label>
    <input type="email" name="correoElectronico" id="correoElectronico" value="{{ isset($empleado -> correoelectronico) ? $empleado -> correoelectronico : old('correoElectronico') }}">
    <label for="correoEmpresarial">{{ 'Correo Empresarial' }}</label>
    <input type="email" name="correoEmpresarial" id="correoEmpresarial" value="{{ isset($empleado -> correoempresarial) ? $empleado -> correoempresarial : old('correoEmpresarial') }}">
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
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/empleado/') }}">REGRESAR</a>