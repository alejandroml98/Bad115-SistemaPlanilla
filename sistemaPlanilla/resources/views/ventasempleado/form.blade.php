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
        <option value="" selected disabled>Selecciona un empleado</option>
        @foreach ($empleados as $empleado)            
            <option value="{{ $empleado -> codigoempleado }}">{{ $empleado -> codigoempleado }} - {{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}</option>                
        @endforeach
    </select>
    <label for="valorVenta">{{ 'Valor Venta' }}</label>
    <input type="number" name="valorVenta" id="valorVentaCreate" value="{{ old('valorVentaCreate') }}">
    <label for="fechaVenta">{{ 'fecha Venta' }}</label>
    <input type="date" name="fechaVenta" id="fechaVentaCreate" value="{{ old('fechaVentaCreate') }}">
@else
    <select name="codigoEmpleado" id="codigoEmpleado" required>        
        @foreach ($empleados as $empleado)            
            @if ($ventaEmpleado -> codigoempleado == $empleado -> codigoempleado)
                <option value="{{ $empleado -> codigoempleado }}" selected>{{ $empleado -> codigoempleado }} - {{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}</option>
            @else
                <option value="{{ $empleado -> codigoempleado }}">{{ $empleado -> codigoempleado }} - {{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}</option>
            @endif                        
        @endforeach
    </select>
    <label for="valorVenta">{{ 'Valor Venta' }}</label>
    <input type="number" name="valorVenta" id="valorVenta" value="{{ isset($ventaEmpleado -> valorventa) ? $ventaEmpleado -> valorventa: old('valorVenta') }}">
    <label for="fechaVenta">{{ 'fecha Venta' }}</label>
    <input type="date" name="fechaVenta" id="fechaVenta" value="{{ isset($ventaEmpleado -> fechaventa) ? $ventaEmpleado -> fechaventa -> format('Y-m-d') : old('fechaVenta') }}">
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/ventasempleado/') }}">REGRESAR</a>