@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Número Cuenta</th>
            <th>Banco</th>
            <th>Saldo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuentasBancarias as $cuentaBancaria)            
            <tr>
                <td>{{ $cuentaBancaria -> idcuentabancaria }}</td>
                <td>{{ $cuentaBancaria -> cuentabancaria }}</td>
                @foreach ($bancos as $banco)
                    @if ($banco -> idbanco == $cuentaBancaria -> idbanco)
                        <td>{{ $banco -> nombrebanco }}</td>
                    @endif
                @endforeach
                <td>{{ $cuentaBancaria -> saldocuentabancaria }}</td>
                <td>
                    <a href="{{ url('/cuentabancaria/'.$cuentaBancaria -> idcuentabancaria.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/cuentabancaria/'.$cuentaBancaria -> idcuentabancaria) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="text" name="codigoEmpleado" hidden value="{{ $cuentaBancaria -> codigoempleado }}">
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>