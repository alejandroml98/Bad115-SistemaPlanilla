<section class="panel panel-featured">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
        <h2 class="panel-title">Descuentos del empleado</h2>
        <a class="panel-subtitle btn btn-success p-2 mt-4" href="{{ url('/tipodescuentoempleado/create', [$empleado -> codigoempleado]) }}">
            Agregar Descuento <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none mostrar" id="datatable-default">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tipo Descuento</th>            
                    <th>Valor Descuento (%)</th>
                    <th>Contador Descuento</th>  
                    <th style="width: 1%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $nombreDescuento = "";
                @endphp
                @foreach ($tiposDescuentosEmpleados as $tipoDescuentoEmpleado)                    
                <tr class="gradeX">
                    <td>{{ $loop -> iteration}}</td>
                    @foreach ($tiposDescuentos as $tipoDescuento)
                    @if ($tipoDescuento -> idtipodescuento == $tipoDescuentoEmpleado -> idtipodescuento)
                        <td>
                            {{ $nombreDescuento = $tipoDescuento -> nombretipodescuento }}
                        </td>
                    @endif
                    @endforeach
                    <td>{{ $tipoDescuentoEmpleado -> valortipodescuentoempleado }}</td>
                    <td>{{ $tipoDescuentoEmpleado -> contadortipodescuentoempleado }}</td> 
                    <td class="text-center">
                        <a href="{{ url('/tipodescuentoempleado/'.$tipoDescuentoEmpleado -> idtipodescuentoempleado.'/edit') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba-descuento'.$tipoDescuentoEmpleado -> idtipodescuentoempleado }}" class="btn btn-danger p-0" method="post" action="{{ url('/tipodescuentoempleado/'.$tipoDescuentoEmpleado -> idtipodescuentoempleado) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="text" name="codigoEmpleado" hidden value="{{ $tipoDescuentoEmpleado -> codigoempleado }}">
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $tipoDescuentoEmpleado -> idtipodescuentoempleado }}', '{{ $nombreDescuento }}','el descuento')">
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