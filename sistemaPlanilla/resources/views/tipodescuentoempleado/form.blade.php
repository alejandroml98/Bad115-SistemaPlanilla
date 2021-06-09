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
    <select name="idTipoDescuento" id="idTipoDescuento">
        <option value="" selected disabled>Seleccione el tipo de descuento</option>
        @foreach ($tiposDescuentos as $tipoDescuento)
            <option value="{{ $tipoDescuento -> idtipodescuento }}">{{ $tipoDescuento -> nombretipodescuento }}</option>
        @endforeach
    </select>
    <label for="valorTipoDescuentoEmpleado">{{ 'Valor del descuento (%)' }}</label>
    <input type="number" step=".01" min="0" max="999999.99" name="valorTipoDescuentoEmpleado" id="valorTipoDescuentoEmpleadoCreate" value="{{ old('valorTipoDescuentoEmpleadoCreate') }}">
    <label for="contadorTipoDescuentoEmpleado">{{ 'Contador Tipo Descuento Empleado' }}</label>
    <input type="number" step="1" min="0" name="contadorTipoDescuentoEmpleado" id="contadorTipoDescuentoEmpleadoCreate" value="{{ old('contadorTipoDescuentoEmpleadoCreate') }}">
@else    
    <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
    <select name="idTipoDescuento" id="idTipoDescuento">        
        @foreach ($tiposDescuentos as $tipoDescuento)
            @if ($tipoDescuentoEmpleado -> idtipodescuento == $tipoDescuento -> idtipodescuento)
                <option value="{{ $tipoDescuento -> idtipodescuento }}" selected>{{ $tipoDescuento -> nombretipodescuento }}</option>
            @else
            <option value="{{ $tipoDescuento -> idtipodescuento }}">{{ $tipoDescuento -> nombretipodescuento }}
            @endif            
        @endforeach
    </select>
    <label for="valorTipoDescuentoEmpleado">{{ 'Valor del descuento (%)' }}</label>
    <input type="number" step=".01" min="0" max="999999.99" name="valorTipoDescuentoEmpleado" id="valorTipoDescuentoEmpleado" value="{{ isset($tipoDescuentoEmpleado -> valortipodescuentoempleado) ? $tipoDescuentoEmpleado -> valortipodescuentoempleado : old('valorTipoDescuentoEmpleado') }}">
    <label for="contadorTipoDescuentoEmpleado">{{ 'Contador Tipo Descuento Empleado' }}</label>
    <input type="number" step="1" min="0" name="contadorTipoDescuentoEmpleado" id="contadorTipoDescuentoEmpleado" value="{{ isset($tipoDescuentoEmpleado -> contadortipodescuentoempleado) ? $tipoDescuentoEmpleado -> contadortipodescuentoempleado : old('contadorTipoDescuentoEmpleado') }}">
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}">REGRESAR</a>