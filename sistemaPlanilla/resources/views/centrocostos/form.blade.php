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
<h2>{{ $mode == 'create' ? 'Agregar Presupuesto de Inicio'  : 'Modificar  Presupuesto de Inicio' }}</h2>
@if ($mode == 'create')
<label for="presupuestoInicial">{{ 'Presupuesto Inicial' }}</label>
<input type="number" step=".01" name="presupuestoInicial" id="presupuestoInicial" value="{{ old('presupuestoInicial') }}">
@else   
<label for="presupuestoInicial">{{ 'Presupuesto Inicial' }}</label>
<input type="number"  step=".01" name="presupuestoInicial" id="presupuestoInicial" value="{{ isset($centroCostos -> presupuestoinicial) ? $centroCostos -> presupuestoinicial : old('presupuestoInicial') }}">

@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/catalogocomision/') }}">REGRESAR</a>