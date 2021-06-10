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
        {{ 'Agregar Unidad para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
    @else
        {{ 'Modificar Unidad para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}               
    @endif
</h2>
@if ($mode == 'create')    
    <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
    <label for="codigoUnidad">{{ 'Unidad' }}</label>
    <select name="codigoUnidad" id="codigoUnidad">
        <option value="" selected disabled>Seleccione una unidad</option>
        @foreach ($unidades as $unidad)
            <option value="{{ $unidad -> codigounidad }}">{{ $unidad -> nombreunidad }}</option>
        @endforeach
    </select>
    <label for="esJefe">{{ '¿Es Jefe?' }}</label>
    <input type="checkbox" name="esJefe" id="esJefe" value="1">
@else    
    <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
    <label for="codigoUnidad">{{ 'Unidad' }}</label>    
    <select name="codigoUnidad" id="codigoUnidad">        
        @foreach ($unidades as $unidad)            
            @if ($unidadEmpleado -> codigounidad == $unidad -> codigounidad)
                <option value="{{ $unidad -> codigounidad }}" selected>{{ $unidad -> nombreunidad }}</option>
            @else
                <option value="{{ $unidad -> codigounidad }}">{{ $unidad -> nombreunidad }}</option>
            @endif            
        @endforeach
    </select>
    <label for="esJefe">{{ '¿Es Jefe?' }}</label>
    @if ($unidadEmpleado -> esjefe)
        <input type="checkbox" name="esJefe" id="esJefe" value="1" checked>
    @else
        <input type="checkbox" name="esJefe" id="esJefe" value="1">
    @endif  
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}">REGRESAR</a>