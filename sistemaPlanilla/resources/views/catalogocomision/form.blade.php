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
<h2>{{ $mode == 'create' ? 'Agregar Comision'  : 'Modificar Comision' }}</h2>
@if ($mode == 'create')
<label for="nombreComision">{{ 'Nombre' }}</label>
<input type="text" name="nombreComision" id="nombreComision" value="{{ old('nombreComision') }}">
<label for="porcentaje">{{ 'Porcentaje' }}</label>
<input type="number" step=".01" name="porcentaje" id="porcentaje" value="{{ old('porcentaje') }}">
<label for="valMinComision">{{ 'Valor Minimo' }}</label>
<input type="number" min="0" name="valMinComision" id="valMinComision" value="{{ old('valMinComision') }}">
<label for="valMaxComision">{{ 'Valor Maximo' }}</label>
<input type="number" min="0" name="valMaxComision" id="valMaxComision" value="{{ old('valMaxComision') }}">
@else   
<label for="nombreComision">{{ 'Nombre' }}</label>
<input type="text" name="nombreComision" id="nombreComision" value="{{ isset($catalogoComision -> nombrecomision) ? $catalogoComision -> nombrecomision : old('nombreComision') }}">
<label for="porcentaje">{{ 'Porcentaje' }}</label>
<input type="number"  step=".01" name="porcentaje" id="porcentaje" value="{{ isset($catalogoComision -> porcentaje) ? $catalogoComision -> porcentaje : old('porcentaje') }}">
<label for="valMinComision">{{ 'Valor Minimo' }}</label>
<input type="number" min="0" name="valMinComision" id="valMinComision" value="{{ isset($catalogoComision -> valmincomision) ? $catalogoComision -> valmincomision : old('valMinComision') }}">
<label for="valMaxComision">{{ 'Valor Maximo' }}</label>
<input type="number" min="0" name="valMaxComision" id="valMaxComision" value="{{ isset($catalogoComision -> valmaxcomision) ? $catalogoComision -> valmaxcomision : old('valMaxComision') }}">

@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/catalogocomision/') }}">REGRESAR</a>


