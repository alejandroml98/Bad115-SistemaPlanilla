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

<h2>{{ $mode == 'create' ? 'Agregar Ventas del Empleado'  : 'Modificar Ventas del Empleado' }}</h2>

<label for="codigoEmpleado">{{ 'Codigo del Empleado' }}</label>
@if ($mode == 'create')
    <select name="codigoEmpleado" id="codigoEmpleado" required>
        <option value="">Selecciona un empleado</option>
        @foreach ($empleados as $empleado)            
            <option value="{{ $empleado -> codigoempleado }}">{{ $empleado -> codigoempleado }} - {{ $empleado -> codigoempleado }}</option>                
        @endforeach
    </select>
@else
    <select name="codigoEmpleado" id="codigoEmpleado" required>
        <option value="">Selecciona un Empleado</option>
        @foreach ($empleados as $empleado)
            @if (isset($ventaempleado -> idventasempleado))
                @if ($ventaempleado -> idventasempleado == $empleado -> codigoempleado)
                    <option value="{{ $empleado -> codigoempleado }}" selected>{{ $empleado-> codigoempleado }} </option>                    
                @else
                    <option value="{{ $empleado -> codigoempleado }}">{{ $empleado -> codigoempleado }}</option>                                
                @endif            
            @endif
        @endforeach
    </select>
@endif

@if ($mode == 'create')
    <label for="valorVenta">{{ 'Valor Venta' }}</label>
    <input type="number" name="valorVenta" id="valorVenta" value="{{ old('valorVenta') }}">
    <label for="fechaVenta">{{ 'fecha Venta' }}</label>
    <input type="number" name="fechaVenta" id="fechaVenta" value="{{ old('fechaVenta') }}">

@else
    <label for="valorVenta">{{ 'Valor Venta' }}</label>
    <input type="number" name="valorVenta" id="valorVenta" value="{{ isset($ventaEmpleado -> valorVenta) ? $ventaEmpleado -> valorVenta: old('valorVenta') }}">
    <label for="fechaVenta">{{ 'fecha Venta' }}</label>
    <input type="number" name="fechaVenta" id="fechaVenta" value="{{ isset($ventaEmpleado -> fechaventa) ? $ventaEmpleado -> fechaventa : old('fechaVenta') }}">
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/ventasempleado/') }}">REGRESAR</a>