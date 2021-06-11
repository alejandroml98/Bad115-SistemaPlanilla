@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
@endpush
@section('content')
<a class="btn btn-primary mb-3" href="{{ url('/tipounidad/create') }}" id="btnCrear">
    Agregar Tipo Unidad <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Tipos de Unidades Registradas</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo Unidad</th>
                    <th>Tipo Unidad Padre</th>
                    <th style="width: 1%;">Acciones</th>
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
                    <td class="text-center">
                        <a href="{{ url('/tipounidad/'.$tipoUnidad -> idtipounidad.'/edit') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba'.$tipoUnidad -> idtipounidad }}" class="btn btn-danger p-0" method="post" action="{{ url('/tipounidad/'.$tipoUnidad -> idtipounidad) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $tipoUnidad -> idtipounidad }}', '{{ $tipoUnidad -> nombretipounidad }}','el tipo unidad')">
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
@endpush