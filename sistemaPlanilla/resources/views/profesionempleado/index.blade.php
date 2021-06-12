<section class="panel panel-featured">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
        <h2 class="panel-title">Profesiones del Empleado</h2>
        <a class="panel-subtitle btn btn-success p-2 mt-4" href="{{ url('/profesionempleado/create', [$empleado -> codigoempleado]) }}">
            Agregar Profesion <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none mostrar" id="datatable-default">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Profesión</th>
                    <th style="width: 1%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $nombreProfesion = "";
                @endphp
                @foreach ($profesionesEmpleados as $profesionEmpleado)   
                <tr class="gradeX">
                    <td>{{ $loop -> iteration}}</td>
                    @foreach ($profesiones as $profesion)
                        @if ($profesion -> idprofesion == $profesionEmpleado -> idprofesion)
                            <td>{{ $nombreProfesion = $profesion -> nombreprofesion }}</td>
                        @endif
                    @endforeach
                    <td class="text-center">
                        <a href="{{ url('/profesionempleado/'.$profesionEmpleado -> idprofesionempleado.'/edit') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba'.$profesionEmpleado -> idprofesionempleado }}" class="btn btn-danger p-0" method="post" action="{{ url('/profesionempleado/'.$profesionEmpleado -> idprofesionempleado) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="text" name="codigoEmpleado" hidden value="{{ $profesionEmpleado -> codigoempleado }}">
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $profesionEmpleado -> idprofesionempleado }}', '{{ $nombreProfesion }} del empleado','la profesion')">
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