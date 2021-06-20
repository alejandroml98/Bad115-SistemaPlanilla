@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/pnotify/pnotify.custom.css') }}" />
@endpush
@section('content')
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Unidades Registradas</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Código Unidad</th>
                    <th>Nombre Unidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unidadesPrincipales as $u)
                <tr class="gradeX">
                    <td>{{ $u -> codigounidad }}</td>
                    <td>{{ $u -> nombreunidad }}</td>
                    <td class="text-center">
                        <a href="{{ url('/planilla/'.$u -> codigounidad.'/generarplanilla') }}" class="btn btn-primary">Generar Planilla</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection

@push('vendorjs')
<script src="{{ asset('assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2_locale_es.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js') }}"></script>
<script src="{{ asset('assets/javascripts/tables/examples.datatables.default.js') }}"></script>
<script src="{{ asset('assets/vendor/pnotify/pnotify.custom.js') }}"></script>
<script src="{{ asset('assets/javascripts/ui-elements/examples.modals.js') }}"></script>
<script src="{{ asset('js/profesion.js') }}"></script>
@if (Session::has('mensaje'))
<script type="text/javascript">
    mostrarMensaje('{{ Session::get("mensaje") }}');
</script>
@endif
@endpush