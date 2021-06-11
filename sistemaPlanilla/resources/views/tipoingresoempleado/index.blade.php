<a class="btn btn-primary mb-3" href="{{ url('/tipoingresosempleado/create', [$empleado -> codigoempleado]) }}">
Agregar Ingreso <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
        <h2 class="panel-title">Ingresos del Empleado</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none mostrar" id="datatable-default">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tipo Ingreso</th>            
                    <th>Valor Ingreso</th>
                    <th>Contador Ingreso</th>
                    <th style="width: 1%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiposIngresosEmpleados as $tipoIngresoEmpleado)   
                <tr class="gradeX">
                    <td>{{ $loop -> iteration}}</td>
                    @foreach ($tiposIngresos as $tipoIngreso)
                    @if ($tipoIngreso -> idtipoingresos == $tipoIngresoEmpleado -> idtipoingresos)
                        <td>{{ $tipoIngreso -> nombretipoingresos }}</td>
                    @endif
                    @endforeach
                    <td>{{ $tipoIngresoEmpleado -> valotipoingresoempleado }}</td>
                    <td>{{ $tipoIngresoEmpleado -> contadortipoingresoempleado }}</td>
                    <td class="text-center">
                        <a href="{{ url('/tipoingresosempleado/'.$tipoIngresoEmpleado -> idtipoingresoempleado.'/edit') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba'.$tipoIngresoEmpleado -> idtipoingresoempleado }}" class="btn btn-danger p-0" method="post" action="{{ url('/tipoingresosempleado/'.$tipoIngresoEmpleado -> idtipoingresoempleado) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $tipoIngresoEmpleado -> idtipoingresoempleado }}', '{{ $tipoIngreso -> nombretipoingresos }} del empleado','el ingreso')">
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