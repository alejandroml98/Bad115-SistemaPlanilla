<header class="panel-heading">
    <h2 class="panel-title">{{ $mode == 'create' ? 'Agregar Puesto'  : 'Modificar Puesto' }}</h2>
</header>
<div class="panel-body p-5">
    @if ($mode == 'create')
    <div class="form-group">
        <label for="codigoPuesto">{{ 'Código' }}</label>
        <input type="text" name="codigoPuesto" id="codigoPuestoCreate" maxlength="7" value="{{ old('codigoPuestoCreate') }}" class="form-control" aria-describedby="codigoPuesto" placeholder="Ingrese el codigo">
        <small id="codigoPuesto" class="form-text text-muted">El código consta de 2 letras y 5 números.</small>
    </div>
    <div class="form-group">
        <label for="nombrePuesto">{{ 'Puesto' }}</label>
        <input type="text" name="nombrePuesto" id="nombrePuestoCreate" value="{{ old('nombrePuestoCreate') }}" class="form-control" aria-describedby="nombrePuesto" placeholder="Ingrese el nombre">
    </div>
    <div class="form-group">
        <div class="form-check p-0">
            <label for="esAdministrativo" class="form-check-label pr-3">{{ '¿Administrador?' }}</label>
            <input type="checkbox" name="esAdministrativo" id="esAdministrativoCreate" value="1" class="form-check-input">
        </div>
    </div>
    <div class="form-group">
        <label for="idRangoSalarial">Rango Salarial</label>
        <select class="form-control mt-1" name="idRangoSalarial" id="idRangoSalarialCreate">
            <option value="" disabled selected>Salario Mínimo - Salario Máximo</option>
            @foreach ($rangosSalariales as $rangoSalarial)
            <option value="{{ $rangoSalarial -> idrangosalarial }}">${{ $rangoSalarial -> salariominimo }} - ${{ $rangoSalarial -> salariomaximo }}</option>
            @endforeach
        </select>
    </div>
    @else
    <input type="text" name="codigoPuestoAnterior" id="codigoPuestoAnterior" maxlength="7" hidden value="{{ isset($puesto -> codigopuesto) ? $puesto -> codigopuesto : old('codigoPuesto') }}">
    <div class="form-group">
        <label for="codigoPuesto">{{ 'Código' }}</label>
        <input type="text" name="codigoPuesto" id="codigoPuesto" maxlength="7" value="{{ isset($puesto -> codigopuesto) ? $puesto -> codigopuesto : old('codigoPuesto') }}" class="form-control" aria-describedby="codigoPuesto" placeholder="Ingrese el codigo">
        <small id="codigoPuesto" class="form-text text-muted">El código consta de 2 letras y 5 números.</small>
    </div>
    <div class="form-group">
        <label for="nombrePuesto">{{ 'Puesto' }}</label>
        <input type="text" name="nombrePuesto" id="nombrePuesto" value="{{ isset($puesto -> nombrepuesto) ? $puesto -> nombrepuesto : old('nombrePuesto') }}" class="form-control" aria-describedby="nombrePuesto" placeholder="Ingrese el nombre">
    </div>
    <div class="form-group">
        <div class="form-check p-0">
            <label for="esAdministrativo" class="form-check-label pr-3">{{ '¿Administrador?' }}</label>
            @if ($puesto -> esadministrativo)
            <input type="checkbox" name="esAdministrativo" id="esAdministrativo" value="1" class="form-check-input" checked>
            @else
            <input type="checkbox" name="esAdministrativo" id="esAdministrativo" value="1" class="form-check-input">
            @endif
        </div>
    </div>
    <div class="form-group">
        <label for="idRangoSalarial">Rango Salarial</label>
        <select class="form-control mt-1" name="idRangoSalarial" id="idRangoSalarial">
            @foreach ($rangosSalariales as $rangoSalarial)
            @if ($puesto -> idrangosalarial == $rangoSalarial -> idrangosalarial)
            <option value="{{ $rangoSalarial -> idrangosalarial }}" selected>${{ $rangoSalarial -> salariominimo }} - ${{ $rangoSalarial -> salariomaximo }}</option>
            @else
            <option value="{{ $rangoSalarial -> idrangosalarial }}">${{ $rangoSalarial -> salariominimo }} - ${{ $rangoSalarial -> salariomaximo }}</option>
            @endif
            @endforeach
        </select>
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
        <a href="{{ url('/puesto/') }}" class="btn btn-danger">Cancelar</a>
    </div>
</div>