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
<h2>{{ $mode == 'create' ? 'Agregar Tipo de Renta'  : 'Modificar Tipo de Renta' }}</h2>
@if ($mode == 'create')
<label for="valMin">{{ 'Valor Minimo' }}</label>
<input type="number" step=".01" min="0" name="valMin"  id="valMin" value="{{ isset($renta -> valmin) ? $renta -> valmin : old('valMin') }}">
<label for="valMax">{{ 'Valor Maximo' }}</label>
<input type="number"  step=".01" min="0" name="valMax" id="valMax" value="{{ isset($renta -> valmax) ? $renta -> valmax : old('valMax') }}">
<label for="valorFijo">{{ 'Valor Fijo' }}</label>
<input type="number" step=".01" min="0" name="valorFijo" id="valorFijo" value="{{ isset($renta -> valorfijo) ? $renta -> valorfijo : old('valorFijo') }}">
<label for="exceso">{{ 'Exceso' }}</label>
<input type="number" step=".01" min="0" name="exceso" id="exceso" value="{{ isset($renta -> exceso) ? $renta -> exceso : old('exceso') }}">
<label for="periodo">{{ 'Periodo' }}</label>
<input type="text" name="periodo" id="periodo" value="{{ old('periodo') }}">
@else   
<label for="valMin">{{ 'Valor Minimo' }}</label>
<input type="number" name="valMin" step=".01" min="0" id="valMin" value="{{ isset($renta -> valmin) ? $renta -> valmin : old('valMin') }}">
<label for="valMax">{{ 'Valor Maximo' }}</label>
<input type="number" step=".01" min="0" name="valMax" id="valMax" value="{{ isset($renta -> valmax) ? $renta -> valmax : old('valMax') }}">
<label for="valorFijo">{{ 'Valor Fijo' }}</label>
<input type="number" step=".01" min="0" name="valorFijo" id="valorFijo" value="{{ isset($renta -> valorfijo) ? $renta -> valorfijo : old('valorFijo') }}">
<label for="exceso">{{ 'Exceso' }}</label>
<input type="number" step=".01" min="0" name="exceso" id="exceso" value="{{ isset($renta -> exceso) ? $renta -> exceso : old('exceso') }}">
<label for="periodo">{{ 'Periodo' }}</label>
<input type="text" name="periodo" id="periodo" value="{{ isset($renta -> periodo) ? $renta -> periodo : old('periodo') }}">

@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/renta/') }}">REGRESAR</a>
