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
@if (Session::has('mensaje'))
    <h1>{{ Session::get('mensaje') }}</h1>
@endif
<h2>{{ $mode == 'create' ? 'Agregar Puesto'  : 'Modificar Puesto' }}</h2>
@if ($mode == 'create')
    <label for="codigoPuesto">{{ 'Código' }}</label>
    <input type="text" name="codigoPuesto" id="codigoPuestoCreate" maxlength="7" value="{{ old('codigoPuestoCreate') }}">   
    <label for="nombrePuesto">{{ 'Puesto' }}</label>
    <input type="text" name="nombrePuesto" id="nombrePuestoCreate" value="{{ old('nombrePuestoCreate') }}">
    <label for="esAdministrativo">{{ '¿Administrador?' }}</label>    
    <input type="checkbox" name="esAdministrativo" id="esAdministrativoCreate" value="1">
    <select name="idRangoSalarial" id="idRangoSalarialCreate">
        <option value="" disabled selected>Salario Mínimo - Salario Máximo</option>
        @foreach ($rangosSalariales as $rangoSalarial)
            <option value="{{ $rangoSalarial -> idrangosalarial }}">${{ $rangoSalarial -> salariominimo }} - ${{ $rangoSalarial -> salariomaximo }}</option>
        @endforeach
    </select>    
@else   
    <input type="text" name="codigoPuestoAnterior" id="codigoPuestoAnterior" maxlength="7" hidden value="{{ isset($puesto -> codigopuesto) ? $puesto -> codigopuesto : old('codigoPuesto') }}">   
    <label for="codigoPuesto">{{ 'Código' }}</label>
    <input type="text" name="codigoPuesto" id="codigoPuesto" maxlength="7" value="{{ isset($puesto -> codigopuesto) ? $puesto -> codigopuesto : old('codigoPuesto') }}">   
    <label for="nombrePuesto">{{ 'Puesto' }}</label>
    <input type="text" name="nombrePuesto" id="nombrePuesto" value="{{ isset($puesto -> nombrepuesto) ? $puesto -> nombrepuesto : old('nombrePuesto') }}">
    <label for="esAdministrativo">{{ '¿Administrador?' }}</label>
    @if ($puesto -> esadministrativo)
        <input type="checkbox" name="esAdministrativo" id="esAdministrativo" value="1" checked>
    @else
        <input type="checkbox" name="esAdministrativo" id="esAdministrativo" value="1">
    @endif        
    <select name="idRangoSalarial" id="idRangoSalarial">        
        @foreach ($rangosSalariales as $rangoSalarial)
            @if ($puesto -> idrangosalarial == $rangoSalarial -> idrangosalarial)
                <option value="{{ $rangoSalarial -> idrangosalarial }}" selected>${{ $rangoSalarial -> salariominimo }} - ${{ $rangoSalarial -> salariomaximo }}</option>        
            @else
                <option value="{{ $rangoSalarial -> idrangosalarial }}">${{ $rangoSalarial -> salariominimo }} - ${{ $rangoSalarial -> salariomaximo }}</option>        
            @endif            
        @endforeach
    </select>
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}"> 
<a href="{{ url('/puesto/') }}">REGRESAR</a>