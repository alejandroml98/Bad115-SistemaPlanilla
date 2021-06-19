<header class="panel-heading">
    <h2 class="panel-title">
        @if ($mode == 'create')
            {{ 'Agregar detalles del Centro Costos para ' }}{{ $unidad -> nombreunidad }}
        @else
            {{ 'Modificar detalles del Centro Costos para ' }}{{ $unidad -> nombreunidad }}
        @endif
    </h2>
</header>
<div class="panel-body p-5">
    @if ($mode == 'create')
        <input type="text" hidden name="codigoUnidad" id="codigoUnidad" value="{{ $unidad -> codigounidad }}">
        <div class="form-group">
            <label for="idCentroCostos">{{ 'Centro Costos' }}</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="idCentroCostos" id="idCentroCostos">
                <option value="" selected disabled>Seleccione un centro de costos</option>
                @foreach ($centrosCostos as $centroCostos)
                    <option value="{{ $centroCostos -> idcentrocostos }}">{{ 'Presupuesto Inicial: ' }}{{ $centroCostos -> presupuestoinicial }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="presupuestoFinal">{{ 'Presupuesto Final' }}</label>
            <input type="number" step=".01" min="0" max="999999.99" name="presupuestoFinal" id="presupuestoFinalCreate" value="{{ old('presupuestoFinalCreate') }}" class="form-control" placeholder="Digite el valor monetario del presupuesto">
        </div>
        <div class="form-group">
            <label for="gastoTotal">{{ 'Gasto Total' }}</label>
            <input type="number" step=".01" min="0" max="999999.99" name="gastoTotal" id="gastoTotalCreate" value="{{ old('gastoTotalCreate') }}" class="form-control" placeholder="Digite el valor monetario de los gastos">
        </div>
        <div class="form-group">
            <label class="control-label" for="anio" class="control-label">{{ 'Año' }}</label>
            <div class="input-group date">
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
                <input data-plugin-datepicker data-date-end-date="new Date()" type="text" class="form-control" name="anio" id="anioCreate" value="{{ isset($centroCostos -> anio) ? date('Y/m/d', strtotime($centroCostos -> anio)) : old('anioCreate') }}">
            </div>
        </div>   
    @else
        <input type="text" hidden name="codigoUnidad" id="codigoUnidad" value="{{ $unidad -> codigounidad }}">
        <div class="form-group">
            <label for="idCentroCostos">{{ 'Centro Costos' }}</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="idCentroCostos" id="idCentroCostos">
                @foreach ($centrosCostos as $centroCostos)
                    @if ($unidadCentroCostos -> idcentrocostos == $centroCostos -> idcentrocostos)
                        <option value="{{ $centroCostos -> idcentrocostos }}" selected>{{ 'Presupuesto Inicial: ' }}{{ $centroCostos -> presupuestoinicial }}</option>
                    @else
                        <option value="{{ $centroCostos -> idcentrocostos }}">{{ 'Presupuesto Inicial: ' }}{{ $centroCostos -> presupuestoinicial }}</option>
                    @endif            
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="presupuestoFinal">{{ 'Presupuesto Final' }}</label>
            <input type="number" step=".01" min="0" max="999999.99" name="presupuestoFinal" id="presupuestoFinal" value="{{ isset($unidadCentroCostos -> presupuestofinal) ? $unidadCentroCostos -> presupuestofinal : old('presupuestoFinal') }}" class="form-control" placeholder="Digite el valor monetario del presupuesto">
        </div>
        <div class="form-group">
            <label for="gastoTotal">{{ 'Gasto Total' }}</label>
            <input type="number" step=".01" min="0" max="999999.99" name="gastoTotal" id="gastoTotal" value="{{ isset($unidadCentroCostos -> gastototal) ? $unidadCentroCostos -> gastototal : old('gastoTotal') }}" class="form-control" placeholder="Digite el valor monetario de los gastos">
        </div>
        <div class="form-group">
            <label class="control-label" for="anio" class="control-label">{{ 'Año' }}</label>
            <div class="input-group date">
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
                <input data-plugin-datepicker data-date-end-date="new Date()" type="text" class="form-control" name="anio" id="anio" value="{{ isset($unidadCentroCostos -> anio) ? $unidadCentroCostos -> anio -> format('Y-m-d') : old('anio') }}">
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
        <a href="{{ url('/unidad/'.$unidad -> codigounidad.'/edit') }}" class="btn btn-danger">Cancelar</a>
    </div>
</div>