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
        {{ 'Agregar Descuento para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
    @else
        {{ 'Modificar Descuento para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
    @endif
</h2>
@if ($mode == 'create')    
    <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
    <select name="idTipoIngresos" id="idTipoIngresos">
        <option value="" selected disabled>Seleccione el tipo de ingreso</option>
        @foreach ($tiposIngresos as $tipoIngreso)
            <option value="{{ $tipoIngreso -> idtipoingresos }}">{{ $tipoIngreso -> nombretipoingresos }}</option>
        @endforeach
    </select>
    <label for="valoTipoIngresoEmpleado">{{ 'Valor del ingreso' }}</label>
    <input type="number" step=".01" min="0" max="999999.99" name="valoTipoIngresoEmpleado" id="valoTipoIngresoEmpleadoCreate" value="{{ old('valorTipoIngresoEmpleadoCreate') }}">
    <label for="contadorTipoIngresoEmpleado">{{ 'Contador Tipo Descuento Empleado' }}</label>
    <input type="number" step="1" min="0" name="contadorTipoIngresoEmpleado" id="contadorTipoIngresoEmpleadoCreate" value="{{ old('contadorTipoIngresoEmpleadoCreate') }}">
@else    
    <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
    <select name="idTipoIngresos" id="idTipoIngresos">        
        @foreach ($tiposIngresos as $tipoIngreso)
            @if ($tipoIngresoEmpleado -> idtipoingresos == $tipoIngreso -> idtipoingresos)
                <option value="{{ $tipoIngreso -> idtipoingresos }}" selected>{{ $tipoIngreso -> nombretipoingresos }}</option>
            @else
            <option value="{{ $tipoIngreso -> idtipoingresos }}">{{ $tipoIngreso -> nombretipoingresos }}
            @endif            
        @endforeach
    </select>
    <label for="valoTipoIngresoEmpleado">{{ 'Valor del descuento (%)' }}</label>
    <input type="number" step=".01" min="0" max="999999.99" name="valoTipoIngresoEmpleado" id="valoTipoIngresoEmpleado" value="{{ isset($tipoIngresoEmpleado -> valotipoingresoempleado) ? $tipoIngresoEmpleado -> valotipoingresoempleado : old('valorTipoIngresoEmpleado') }}">
    <label for="contadorTipoIngresoEmpleado">{{ 'Contador Tipo Descuento Empleado' }}</label>
    <input type="number" step="1" min="0" name="contadorTipoIngresoEmpleado" id="contadorTipoIngresoEmpleado" value="{{ isset($tipoIngresoEmpleado -> contadortipoingresoempleado) ? $tipoIngresoEmpleado -> contadortipoingresoempleado : old('contadorTipoDescuentoEmpleado') }}">
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}">REGRESAR</a>