@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}
@endif
<a href="{{ url('/tipounidad/create') }}">Agregar Tipo Unidad</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Tipo Unidad</th>
            <th>Tipo Unidad Padre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tiposUnidades as $tipoUnidad)
        <tr>
            <td>{{ $tipoUnidad -> idtipounidad }}</td>
            <td>{{ $tipoUnidad -> nombretipounidad }}</td>
            @if (isset($tipoUnidad -> idtipounidadpadre))
            @foreach ($tiposUnidades as $tipoUnidad2)
            @if ($tipoUnidad -> idtipounidadpadre == $tipoUnidad2 -> idtipounidad)
            <td>{{ $tipoUnidad2 -> nombretipounidad }}</td>
            @endif
            @endforeach
            @else
            <td>{{ 'N/A' }}</td>
            @endif
            <td>
                <a href="{{ url('/tipounidad/'.$tipoUnidad -> idtipounidad.'/edit') }}" class="btn btn-warning">Editar</a>
                <form method="post" action="{{ url('/tipounidad/'.$tipoUnidad -> idtipounidad) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
@endpush
@section('content')
<a class="modal-with-form btn btn-primary mb-3" href="#modalCrearTipoU" id="btnCrear">
    Agregar Tipo Unidad <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Tipos de Unidad Registrados</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="w-50">Tipo Unidad</th>
                    <th class="w-50">Tipo Unidad Padre</th>
                    <th style="width: 1%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiposUnidades as $tipoUnidad)
                <tr class="gradeX">
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $tipoUnidad -> nombretipounidad }}</td>
                    @if (isset($tipoUnidad -> idtipounidadpadre))
                    @foreach ($tiposUnidades as $tipoUnidad2)
                    @if ($tipoUnidad -> idtipounidadpadre == $tipoUnidad2 -> idtipounidad)
                    <td>{{ $tipoUnidad2 -> nombretipounidad }}</td>
                    @endif
                    @endforeach
                    @else
                    <td>{{ 'N/A' }}</td>
                    @endif
                    <td class="text-center">
                        <a class="modal-with-form btn btn-primary editar" id="{{'editar'.$tipoUnidad -> idtipounidad}}" href="#modalEditarTipoU" data-id="{{$tipoUnidad -> idtipounidad}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba'.$tipoUnidad -> idtipounidad }}" class="btn btn-danger p-0" method="post" action="{{ url('/tipounidad/'.$tipoUnidad -> idtipounidad) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $tipoUnidad -> idtipounidad}}', '{{ $tipoUnidad -> nombretipounidad }}','la unidad')">
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



<!-- Modal Crear Tipo Unidad -->
<div class="modal-block modal-block-primary mfp-hide" id="modalCrearTipoU" tabindex="-1" role="dialog" aria-labelledby="modalCrearTipoU" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="demo-form" class="form-horizontal" action="{{ url('/tipounidad') }}" method="post">
                {{ csrf_field() }}
                @include('tipounidad.form', ['mode' => 'create'])
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Tipo Unidad -->
<div class="modal-block modal-block-primary mfp-hide" id="modalEditarTipoU" tabindex="-1" role="dialog" aria-labelledby="modalEditarTipoU" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="editar-form" class="form-horizontal" action="/tipounidad" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                @include('tipounidad.form', ['mode' => 'edit'])
            </form>
        </div>
    </div>
</div>
@endsection
@push('vendorjs')
<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<script src="assets/vendor/select2/select2.js"></script>
<script src="assets/vendor/select2/select2_locale_es.js"></script>
<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
<script src="assets/javascripts/tables/examples.datatables.default.js"></script>
<script src="assets/vendor/pnotify/pnotify.custom.js"></script>
<script src="assets/javascripts/ui-elements/examples.modals.js"></script>
<script src="js/profesion.js"></script>
@if (Session::has('mensaje'))
<script type="text/javascript">
    mostrarMensaje('{{ Session::get("mensaje") }}');
</script>
@endif
@if (count($errors) > 0 && Session::get('peticion') == 'crear')
<script>
    document.getElementById('btnCrear').click();
</script>
@elseif (count($errors) > 0 && Session::get('peticion') != 'crear')
<script>
    document.getElementById("{{Session::get('peticion')}}").click();
</script>
@endif
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#datatable-default').DataTable();
        var id = 1;
        table.on('click', '.editar', function() {
            $tr = $(this).closest('tr');
            id = $(this).data("id");
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('parent');
            }
            var data = table.row($tr).data();
            $('#nombreTipoUnidad').val(data[1]);

            $('#editar-form').attr('action', '/tipounidad/' + id);
            if (('editar'.$id) == "{{Session::get('peticion')}}") {
                document.getElementById("{{'error'.Session::get('peticion')}}").style.display = 'block';
            } else {
                document.getElementById("{{'error'.Session::get('peticion')}}").style.display = 'none';
            }
        });
    });
</script>
@endpush