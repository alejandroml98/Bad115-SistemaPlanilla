@extends('layouts.app')
@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}
@endif
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
@endpush
@section('content')
<a class = "btn btn-secondary mb-3" href="{{ url('/profesion/create') }}">Agregar Profesión</a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Profesiones Registradas</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Profesión</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profesiones as $profesion)
                <tr class="gradeX">
                    <td>{{ $profesion -> idprofesion }}</td>
                    <td>{{ $profesion -> nombreprofesion }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ url('/profesion/'.$profesion -> idprofesion.'/edit') }}">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                        <form method="post" action="{{ url('/profesion/'.$profesion -> idprofesion) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">
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
@endpush