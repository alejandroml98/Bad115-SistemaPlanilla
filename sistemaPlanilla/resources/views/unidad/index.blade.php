@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
@endpush
@section('content')
<a class="btn btn-primary mb-3" href="{{ url('/unidad/create') }}" id="btnCrear">
    Agregar Unidad <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Unidades Registradas</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Unidad</th>
                    <th>Unidad Padre</th>
                    <th>Tipo Unidad</th>
                    <th style="width: 1%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unidades as $unidad)
                <tr class="gradeX">
                    <td>{{ $unidad -> codigounidad }}</td>
                    <td>{{ $unidad -> nombreunidad }}</td>
                    @if (isset($unidad -> codigounidadantecesora))
                    @foreach ($unidades as $unidad2)
                    @if ($unidad -> codigounidadantecesora == $unidad2 -> codigounidad)
                    <td>{{ $unidad2 -> nombreunidad }}</td>
                    @endif
                    @endforeach
                    @else
                    <td>{{ 'N/A' }}</td>
                    @endif
                    @foreach ($tiposUnidades as $tipoUnidad)
                    @if ($tipoUnidad -> idtipounidad == $unidad -> idtipounidad)
                    <td>{{ $tipoUnidad -> nombretipounidad }}</td>
                    @endif
                    @endforeach
                    <td class="text-center">
                        <a href="{{ url('/unidad/'.$unidad -> codigounidad.'/edit')  }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba'.$unidad -> codigounidad}}" class="btn btn-danger p-0" method="post" action="{{ url('/unidad/'.$unidad -> codigounidad) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $unidad -> codigounidad }}', '{{ $unidad -> nombreunidad }}','la unidad')">
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