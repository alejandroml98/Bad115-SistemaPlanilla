<header class="panel-heading">
    <h2 class="panel-title">
        @if ($mode == 'create')
        {{ 'Agregar Unidad para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
        @else
        {{ 'Modificar Unidad para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}               
        @endif
    </h2>
</header>
<div class="panel-body p-5">
    @if ($mode == 'create')
        <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
        <div class="form-group">
            <label for="codigoUnidad">{{ 'Unidad' }}</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="codigoUnidad" id="codigoUnidad">
                <option value="" selected disabled>Seleccione una unidad</option>
                @foreach ($unidades as $unidad)
                    <option value="{{ $unidad -> codigounidad }}">{{ $unidad -> nombreunidad }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <div class="form-check p-0">
                <label for="esJefe" class="form-check-label pr-3">{{ '¿Es Jefe?' }}</label>
                <input type="checkbox" name="esJefe" id="esJefe" value="1" class="form-check-input">
            </div>
        </div>  
    @else
        <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
        <div class="form-group">
            <label for="codigoUnidad">{{ 'Unidad' }}</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="codigoUnidad" id="codigoUnidad">
                @foreach ($unidades as $unidad)            
                @if ($unidadEmpleado -> codigounidad == $unidad -> codigounidad)
                    <option value="{{ $unidad -> codigounidad }}" selected>{{ $unidad -> nombreunidad }}</option>
                @else
                    <option value="{{ $unidad -> codigounidad }}">{{ $unidad -> nombreunidad }}</option>
                @endif            
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <div class="form-check p-0">
                <label for="esJefe" class="form-check-label pr-3">{{ '¿Es Jefe?' }}</label>
                @if ($unidadEmpleado -> esjefe)
                    <input type="checkbox" name="esJefe" id="esJefe" value="1" checked>
                @else
                    <input type="checkbox" name="esJefe" id="esJefe" value="1">
                @endif 
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
        <a href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}" class="btn btn-danger">Cancelar</a>
    </div>
</div>