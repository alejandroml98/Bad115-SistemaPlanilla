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
        {{ 'Agregar Cuenta Bancaria para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
    @else
        {{ 'Modificar Cuenta Bancaria para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
    @endif
</h2>
@if ($mode == 'create')    
    <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
    <select name="idBanco" id="idBanco">
        <option value="" selected disabled>Seleccione el banco de la cuenta</option>
        @foreach ($bancos as $banco)
            <option value="{{ $banco -> idbanco }}">{{ $banco -> nombrebanco }}</option>
        @endforeach
    </select>
    <label for="cuentaBancaria">{{ 'Número de cuenta' }}</label>
    <input type="text" name="cuentaBancaria" id="cuentaBancariaCreate" value="{{ old('cuentaBancariaCreate') }}">
    <label for="saldoCuentaBancaria">{{ 'Saldo de cuenta' }}</label>
    <input type="number" step=".01" min="0" max="999999.99" name="saldoCuentaBancaria" id="saldoCuentaBancariaCreate" value="{{ old('saldoCuentaBancariaCreate') }}">
@else    
    <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
    <select name="idBanco" id="idBanco">        
        @foreach ($bancos as $banco)
            @if ($cuentaBancaria -> idbanco == $banco -> idbanco)
                <option value="{{ $banco -> idbanco }}" selected>{{ $banco -> nombrebanco }}</option>
            @else
                <option value="{{ $banco -> idbanco }}">{{ $banco -> nombrebanco }}</option>
            @endif            
        @endforeach
    </select>
    <label for="cuentaBancaria">{{ 'Número de cuenta' }}</label>
    <input type="text" name="cuentaBancaria" id="cuentaBancariaCreate" value="{{ isset($cuentaBancaria -> cuentabancaria) ? $cuentaBancaria -> cuentabancaria : old('cuentaBancariaCreate') }}">
    <label for="saldoCuentaBancaria">{{ 'Saldo de cuenta' }}</label>
    <input type="number" step=".01" min="0" max="999999.99" name="saldoCuentaBancaria" id="saldoCuentaBancariaCreate" value="{{ isset($cuentaBancaria -> saldocuentabancaria) ? $cuentaBancaria -> saldocuentabancaria : old('saldoCuentaBancariaCreate') }}">
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}">REGRESAR</a>