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
<h2>{{ $mode == 'create' ? 'Agregar Rango Salarial'  : 'Modificar Rango Salarial' }}</h2>
@if ($mode == 'create')
    <label for="salarioMinimo">{{ 'Salario Mínimo' }}</label>
    <input type="number" min="0" step=".01" name="salarioMinimo" id="salarioMinimoCreate" value="{{ old('salarioMinimoCreate')  }}">
    <label for="salarioMaximo">{{ 'Salario Máximo' }}</label>
    <input type="number" min="0" step=".01" name="salarioMaximo" id="salarioMaximo" value="{{ old('salarioMaximoCreate') }}">    
@else   
    <label for="salarioMinimo">{{ 'Salario Mínimo' }}</label>
    <input type="number" min="0" step=".01" name="salarioMinimo" id="salarioMinimo" value="{{ isset($rangoSalarial -> salariominimo) ? $rangoSalarial -> salariominimo : old('salarioMinimo') }}">
    <label for="salarioMaximo">{{ 'Salario Máximo' }}</label>
    <input type="number" min="0" step=".01" name="salarioMaximo" id="salarioMaximo" value="{{ isset($rangoSalarial -> salariomaximo) ? $rangoSalarial -> salariomaximo : old('salarioMaximo') }}">
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}"> 
<a href="{{ url('/rangosalarial/') }}">REGRESAR</a>