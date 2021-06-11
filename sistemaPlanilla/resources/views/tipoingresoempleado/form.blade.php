<header class="panel-heading">
    <h2 class="panel-title">
        @if ($mode == 'create')
            {{ 'Agregar Ingreso para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
        @else
            {{ 'Modificar Ingreso para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
        @endif
    </h2>
</header>
<div class="panel-body p-5">
    @if ($mode == 'create')
        <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
        <div class="form-group">
            <label for="idTipoIngresos">Tipo de ingreso</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="idTipoIngresos" id="idTipoIngresos">
                <option value="" selected disabled>Seleccione el tipo de ingreso</option>
                @foreach ($tiposIngresos as $tipoIngreso)
                    <option value="{{ $tipoIngreso -> idtipoingresos }}">{{ $tipoIngreso -> nombretipoingresos }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="valoTipoIngresoEmpleado">{{ 'Valor del ingreso' }}</label>
            <input type="number" step=".01" min="0" max="999999.99" name="valoTipoIngresoEmpleado" id="valoTipoIngresoEmpleadoCreate" value="{{ old('valorTipoIngresoEmpleadoCreate') }}" class="form-control" placeholder="Digite el valor monetario del ingreso">
        </div>
        <div class="form-group">
            <label for="contadorTipoIngresoEmpleado">{{ 'Contador Tipo Ingreso Empleado' }}</label>
            <input type="number" step="1" min="0" name="contadorTipoIngresoEmpleado" id="contadorTipoIngresoEmpleadoCreate" value="{{ old('contadorTipoIngresoEmpleadoCreate') }}" class="form-control">
        </div>    
    @else
        <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
        <div class="form-group">
            <label for="idTipoIngresos">Tipo de ingreso</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="idTipoIngresos" id="idTipoIngresos">
                @foreach ($tiposIngresos as $tipoIngreso)
                    @if ($tipoIngresoEmpleado -> idtipoingresos == $tipoIngreso -> idtipoingresos)
                        <option value="{{ $tipoIngreso -> idtipoingresos }}" selected>{{ $tipoIngreso -> nombretipoingresos }}</option>
                    @else
                    <option value="{{ $tipoIngreso -> idtipoingresos }}">{{ $tipoIngreso -> nombretipoingresos }}
                    @endif            
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="valoTipoIngresoEmpleado">{{ 'Valor del ingreso' }}</label>
            <input type="number" step=".01" min="0" max="999999.99" name="valoTipoIngresoEmpleado" id="valoTipoIngresoEmpleado" value="{{ isset($tipoIngresoEmpleado -> valotipoingresoempleado) ? $tipoIngresoEmpleado -> valotipoingresoempleado : old('valorTipoIngresoEmpleado') }}" class="form-control" placeholder="Digite el valor monetario del ingreso">
        </div>
        <div class="form-group">
            <label for="contadorTipoIngresoEmpleado">{{ 'Contador Tipo Ingreso Empleado' }}</label>
            <input type="number" step="1" min="0" name="contadorTipoIngresoEmpleado" id="contadorTipoIngresoEmpleado" value="{{ isset($tipoIngresoEmpleado -> contadortipoingresoempleado) ? $tipoIngresoEmpleado -> contadortipoingresoempleado : old('contadorTipoDescuentoEmpleado') }}" class="form-control">
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