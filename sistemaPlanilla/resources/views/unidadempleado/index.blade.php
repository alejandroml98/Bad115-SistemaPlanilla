<section class="panel panel-featured">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
        <h2 class="panel-title">Unidad organizacional a la que pertenece el empleado</h2>
        <a class="panel-subtitle btn btn-success p-2 mt-4" href="{{ url('/unidadempleado/create', [$empleado -> codigoempleado]) }}">
            Agregar Unidad <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none mostrar" id="datatable-default">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Unidad</th>
                    <th>Es Jefe</th>
                    <th style="width: 1%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $nombreUnidad = "";
                @endphp
                @foreach ($unidadesEmpleados as $unidadEmpleado)   
                <tr class="gradeX">
                    <td>{{ $loop -> iteration}}</td>
                    @foreach ($unidades as $unidad)
                        @if ($unidad -> codigounidad == $unidadEmpleado -> codigounidad)
                            <td>{{ $nombreUnidad = $unidad -> nombreunidad }}</td>
                        @endif
                    @endforeach
                    @if ($unidadEmpleado -> esjefe == '1')
                    <td class="text-center text-success text-bold">&#x2713;</td>
                    @else
                    <td class="text-center text-danger text-bold" >&#x2717;</td>
                    @endif
                    <td class="text-center">
                        <a href="{{ url('/unidadempleado/'.$unidadEmpleado -> idunidadempleado.'/edit') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-pruebaUnidad'.$unidadEmpleado -> idunidadempleado }}" class="btn btn-danger p-0" method="post" action="{{ url('/unidadempleado/'.$unidadEmpleado -> idunidadempleado) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="text" name="codigoEmpleado" hidden value="{{ $unidadEmpleado -> codigoempleado }}">
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $unidadEmpleado -> idunidadempleado }}', '{{ $nombreUnidad }}','la unidad', 'Unidad')">
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