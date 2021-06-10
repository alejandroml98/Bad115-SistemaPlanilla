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
        {{ 'Agregar Centro Costos para ' }}{{ $unidad -> nombreunidad }}
    @else
        {{ 'Modificar Centro Costos para ' }}{{ $unidad -> nombreunidad }}
    @endif
</h2>
@if ($mode == 'create')    
    <input type="text" hidden name="codigoUnidad" id="codigoUnidad" value="{{ $unidad -> codigounidad }}">
    <label for="idCentroCostos">{{ 'Centro Costos' }}</label>
    <select name="idCentroCostos" id="idCentroCostos">
        <option value="" selected disabled>Seleccione un centro de costos</option>
        @foreach ($centrosCostos as $centroCostos)
            <option value="{{ $centroCostos -> idcentrocostos }}">{{ 'Presupuesto Inicial: ' }}{{ $centroCostos -> presupuestoinicial }}</option>
        @endforeach
    </select>
    <label for="presupuestoFinal">{{ 'Presupuesto Final' }}</label>
    <input type="number" step=".01" min="0" max="999999.99" name="presupuestoFinal" id="presupuestoFinalCreate" value="{{ old('presupuestoFinalCreate') }}">
    <label for="gastoTotal">{{ 'Gasto Total' }}</label>
    <input type="number" step=".01" min="0" max="999999.99" name="gastoTotal" id="gastoTotalCreate" value="{{ old('gastoTotalCreate') }}">
    <label for="anio">{{ 'Año' }}</label>
    <input type="date" name="anio" id="anioCreate" value="{{ old('anioCreate') }}">
@else    
    <input type="text" hidden name="codigoUnidad" id="codigoUnidad" value="{{ $unidad -> codigounidad }}">
    <label for="idCentroCostos">{{ 'Centro Costos' }}</label>
    <select name="idCentroCostos" id="idCentroCostos">        
        @foreach ($centrosCostos as $centroCostos)
            @if ($unidadCentroCostos -> idcentrocostos == $centroCostos -> idcentrocostos)
                <option value="{{ $centroCostos -> idcentrocostos }}" selected>{{ 'Presupuesto Inicial: ' }}{{ $centroCostos -> presupuestoinicial }}</option>
            @else
                <option value="{{ $centroCostos -> idcentrocostos }}">{{ 'Presupuesto Inicial: ' }}{{ $centroCostos -> presupuestoinicial }}</option>
            @endif            
        @endforeach
    </select>
    <label for="presupuestoFinal">{{ 'Presupuesto Final' }}</label>
    <input type="number" step=".01" min="0" max="999999.99" name="presupuestoFinal" id="presupuestoFinal" value="{{ isset($unidadCentroCostos -> presupuestofinal) ? $unidadCentroCostos -> presupuestofinal : old('presupuestoFinal') }}">
    <label for="gastoTotal">{{ 'Gasto Total' }}</label>
    <input type="number" step=".01" min="0" max="999999.99" name="gastoTotal" id="gastoTotal" value="{{ isset($unidadCentroCostos -> gastototal) ? $unidadCentroCostos -> gastototal : old('gastoTotal') }}">
    <label for="anio">{{ 'Año' }}</label>
    <input type="date" name="anio" id="anio" value="{{ isset($unidadCentroCostos -> anio) ? $unidadCentroCostos -> anio -> format('Y-m-d') : old('anio') }}">    
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/unidad/'.$unidad -> codigounidad.'/edit') }}">REGRESAR</a>