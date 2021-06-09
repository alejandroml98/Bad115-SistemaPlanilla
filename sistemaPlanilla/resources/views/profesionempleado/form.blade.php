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
<h2>
    @if ($mode == 'create')
        {{ 'Agregar Profesión para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
    @else
        {{ 'Modificar Profesión para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
    @endif
</h2>
@if ($mode == 'create')    
    <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
    <select name="idProfesion" id="idProfesion">
        <option value="" selected disabled>Seleccione una profesión</option>
        @foreach ($profesiones as $profesion)
            <option value="{{ $profesion -> idprofesion }}">{{ $profesion -> nombreprofesion }}</option>
        @endforeach
    </select>    
@else    
    <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
    <select name="idProfesion" id="idProfesion">        
        @foreach ($profesiones as $profesion)
            @if ($profesionEmpleado -> idprofesion == $profesion -> idprofesion)
                <option value="{{ $profesion -> idprofesion }}" selected>{{ $profesion -> nombreprofesion }}</option>
            @else
            <option value="{{ $profesion -> idprofesion }}">{{ $profesion -> nombreprofesion }}
            @endif            
        @endforeach
    </select>    
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}">REGRESAR</a>