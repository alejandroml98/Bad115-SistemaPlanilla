<header class="panel-heading">    
    <h2 class="panel-title">
        @if ($mode == 'create')
            {{ 'Agregar Cuenta Bancaria para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
        @else
            {{ 'Modificar Cuenta Bancaria para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
        @endif
    </h2>
</header>
<div class="panel-body p-5">
    @if ($mode == 'create')
        <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
        <div class="form-group">
            <label for="idBanco">Banco</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="idBanco" id="idBanco">
                <option value="" selected disabled>Seleccione el banco de la cuenta</option>
                @foreach ($bancos as $banco)
                    <option value="{{ $banco -> idbanco }}">{{ $banco -> nombrebanco }}</option>
                @endforeach
            </select>
        </div>    
        <div class="form-group">
            <label for="cuentaBancaria">{{ 'Número de cuenta' }}</label>
            <input type="text" name="cuentaBancaria" id="cuentaBancariaCreate" value="{{ old('cuentaBancariaCreate') }}" class="form-control" placeholder="Digitos del numero de cuenta">
            <small id="codigoPuesto" class="form-text text-muted">Ingrese el numero que le proporciono el banco.</small>
        </div>
        <div class="form-group">
            <label for="saldoCuentaBancaria">{{ 'Saldo de cuenta' }}</label>
            <input type="number" step=".01" min="0" max="999999.99" name="saldoCuentaBancaria" id="saldoCuentaBancariaCreate" value="{{ old('saldoCuentaBancariaCreate') }}" class="form-control" placeholder="Ingrese el saldo actual de la cuenta">
        </div>  
    @else
        <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
        <div class="form-group">
            <label for="idBanco">Banco</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="idBanco" id="idBanco">
                @foreach ($bancos as $banco)
                    @if ($cuentaBancaria -> idbanco == $banco -> idbanco)
                        <option value="{{ $banco -> idbanco }}" selected>{{ $banco -> nombrebanco }}</option>
                    @else
                        <option value="{{ $banco -> idbanco }}">{{ $banco -> nombrebanco }}</option>
                    @endif            
                @endforeach
            </select>
        </div>    
        <div class="form-group">
            <label for="cuentaBancaria">{{ 'Número de cuenta' }}</label>
            <input type="text" name="cuentaBancaria" id="cuentaBancariaCreate" value="{{ isset($cuentaBancaria -> cuentabancaria) ? $cuentaBancaria -> cuentabancaria : old('cuentaBancariaCreate') }}" class="form-control" placeholder="Digitos del numero de cuenta">
            <small id="codigoPuesto" class="form-text text-muted">Ingrese el numero que le proporciono el banco.</small>
        </div>
        <div class="form-group">
            <label for="saldoCuentaBancaria">{{ 'Saldo de cuenta' }}</label>
            <input type="number" step=".01" min="0" max="999999.99" name="saldoCuentaBancaria" id="saldoCuentaBancariaCreate" value="{{ isset($cuentaBancaria -> saldocuentabancaria) ? $cuentaBancaria -> saldocuentabancaria : old('saldoCuentaBancariaCreate') }}" class="form-control" placeholder="Ingrese el saldo actual de la cuenta">
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