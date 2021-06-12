<section class="panel panel-featured">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
        <h2 class="panel-title">Documentos del empleado</h2>
        <a class="panel-subtitle btn btn-success p-2 mt-4" href="{{ url('/tipodocumentoempleado/create', [$empleado -> codigoempleado]) }}" id="btnCrear">
            Agregar Documento <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none mostrar" id="datatable-default">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tipo Documento</th>
                    <th>Valor Documento</th>   
                    <th style="width: 1%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $nombreDocumento = "";
                @endphp
                @foreach ($tiposDocumentosEmpleados as $tipoDocumentoEmpleado)
                <tr class="gradeX">
                    <td>{{ $loop -> iteration}}</td>
                    @foreach ($tiposDocumentos as $tipoDocumento)
                        @if ($tipoDocumento -> idtipodocumento == $tipoDocumentoEmpleado -> idtipodocumento)
                            <td>{{ $nombreDocumento = $tipoDocumento -> nombretipodocumento }}</td>
                        @endif
                    @endforeach
                <td>{{ $tipoDocumentoEmpleado -> valordocumento }}</td>  
                    <td class="text-center">
                        <a href="{{ url('/tipodocumentoempleado/'.$tipoDocumentoEmpleado -> idtipodocumentoempleado.'/edit') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba-documento'.$tipoDocumentoEmpleado -> idtipodocumentoempleado }}" class="btn btn-danger p-0" method="post" action="{{ url('/tipodocumentoempleado/'.$tipoDocumentoEmpleado -> idtipodocumentoempleado) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="text" name="codigoEmpleado" hidden value="{{ $tipoDocumentoEmpleado -> codigoempleado }}">
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $tipoDocumentoEmpleado -> idtipodocumentoempleado }}', '{{ $nombreDocumento }}','el documento')">
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