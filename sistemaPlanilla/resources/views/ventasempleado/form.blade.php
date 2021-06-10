<header class="panel-heading">
    <h2 class="panel-title">{{ $mode == 'create' ? 'Agregar Ventas del Empleado'  : 'Modificar Ventas del Empleado' }}</h2>
</header>
<div class="panel-body p-5">
    @if ($mode == 'create')
        <div class="form-group">
            <label for="codigoEmpleado">{{ 'Codigo del Empleado' }}</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="codigoEmpleado" id="codigoEmpleado" required>
                <option value="">Selecciona un empleado</option>
                @foreach ($empleados as $empleado)            
                    <option value="{{ $empleado -> codigoempleado }}">{{ $empleado -> codigoempleado }} - {{ $empleado -> primernombre }} {{ $empleado -> apellidopaterno }}</option>                
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="valorVenta">{{ 'Valor Venta' }}</label>
            <input type="number" name="valorVenta" id="valorVenta" value="{{ old('valorVenta') }}" class="form-control" placeholder="Valor monerario de venta realizada">
        </div>
        <div class="form-group">
			<label for="fechaVenta">{{ 'Fecha Venta' }}</label>
			<div class="input-group date">
				<span class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</span>
				<input data-plugin-datepicker data-date-end-date="new Date()" class="form-control" type="text" name="fechaVenta" id="fechaVentaCreate" value="{{ old('fechaVentaCreate') }}">
			</div>
		</div> 
    @else
    <div class="form-group">
        <label for="codigoEmpleado">{{ 'Codigo del Empleado' }}</label>
        <select data-plugin-selectTwo class="form-control mt-1" name="codigoEmpleado" id="codigoEmpleado" required>
        <option value="">Selecciona un Empleado</option>
            @foreach ($empleados as $empleado)            
                @if ($ventaEmpleado -> codigoempleado == $empleado -> codigoempleado)
                    <option value="{{ $empleado -> codigoempleado }}" selected>{{ $empleado -> codigoempleado }} - {{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}</option>
                @else
                    <option value="{{ $empleado -> codigoempleado }}">{{ $empleado -> codigoempleado }} - {{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}</option>
                @endif                        
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="valorVenta">{{ 'Valor Venta' }}</label>
        <input type="number" name="valorVenta" id="valorVenta" value="{{ isset($ventaEmpleado -> valorventa) ? $ventaEmpleado -> valorventa: old('valorVenta') }}" class="form-control" placeholder="Valor monerario de venta realizada">
    </div>
    <div class="form-group">
		<label for="fechaVenta">{{ 'Fecha Venta' }}</label>
		    <div class="input-group date">
				<span class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</span>
				<input data-plugin-datepicker data-date-end-date="new Date()" type="text" class="form-control" name="fechaVenta" id="fechaVenta" value="{{ isset($ventaEmpleado -> fechaventa) ? date('Y/m/d', strtotime($ventaEmpleado -> fechaventa)) : old('fechaVenta') }}">
			</div>
	</div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-group">
        <input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}" class="btn btn-primary">
        <a href="{{ url('/ventasempleado/') }}" class="btn btn-danger">Cancelar</a>
    </div>
</div>