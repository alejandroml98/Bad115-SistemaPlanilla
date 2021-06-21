
<section class="panel panel-featured">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
        <h2 class="panel-title">Cuentas Bancarias Registradas</h2>
        <a class="panel-subtitle btn btn-success p-2 mt-4" href="{{ url('/cuentabancaria/create', [$empleado -> codigoempleado]) }}" id="btnCrear">
            Agregar Cuenta Bancaria <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Número Cuenta</th>
                    <th>Banco</th>
                    <th>Saldo</th>
                    <th style="width: 1%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cuentasBancarias as $cuentaBancaria)
                <tr class="gradeX">
                    <td>{{ $loop -> iteration}}</td>
                    <td>{{ $cuentaBancaria -> cuentabancaria }}</td>
                    @foreach ($bancos as $banco)
                    @if ($banco -> idbanco == $cuentaBancaria -> idbanco)
                    <td>{{ $banco -> nombrebanco }}</td>
                    @endif
                    @endforeach
                    <td>{{ $cuentaBancaria -> saldocuentabancaria }}</td>
                    <td class="text-center">
                        <a href="{{ url('/cuentabancaria/'.$cuentaBancaria -> idcuentabancaria.'/edit') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba-cuentaBan'.$cuentaBancaria -> idcuentabancaria }}" class="btn btn-danger p-0" method="post" action="{{ url('/cuentabancaria/'.$cuentaBancaria -> idcuentabancaria) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="text" name="codigoEmpleado" hidden value="{{ $cuentaBancaria -> codigoempleado }}">
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $cuentaBancaria -> idcuentabancaria }}', '{{ $cuentaBancaria -> cuentabancaria }}','la cuenta bancaria', '-cuentaBan')">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
