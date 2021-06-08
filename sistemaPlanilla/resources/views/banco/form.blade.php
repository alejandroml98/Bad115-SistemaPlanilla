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
<h2>{{ $mode == 'create' ? 'Agregar Banco'  : 'Modificar Banco' }}</h2>
@if ($mode == 'create')
<label for="nombreBanco">{{ 'Nombre' }}</label>
<input type="text" name="nombreBanco" id="nombreBanco" value="{{ old('nombreBanco') }}">
@else   
<label for="nombreBanco">{{ 'Nombre' }}</label>
<input type="text" name="nombreBanco" id="nombreBanco" value="{{ isset($banco -> nombrebanco) ? $banco -> nombrebanco : old('nombreBanco') }}">

@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/banco/') }}">REGRESAR</a>
