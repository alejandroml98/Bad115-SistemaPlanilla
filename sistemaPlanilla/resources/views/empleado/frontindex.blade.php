<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Empleados Registrados</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Puesto</th>
                    <th style="width: 1%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                <tr class="gradeX">
                    <td>{{ $empleado -> codigoempleado }}</td>
                    <td>{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}</td>
                    <td>{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}</td>
                    @foreach ($puestos as $puesto)
                    @if ($puesto -> codigopuesto == $empleado -> codigopuesto)
                    <td>{{ $puesto -> nombrepuesto }}</td>
                    @endif
                    @endforeach
                    <td class="text-center">
                        <a href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba'.$empleado -> codigoempleado }}" class="btn btn-danger p-0" method="post" action="{{ url('/empleado/'.$empleado -> codigoempleado) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $empleado -> codigoempleado }}', '{{ $empleado -> primernombre }} {{ $empleado -> segundonombre }}','al empleado')">
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