@extends('layouts.app')
@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}
@endif
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
@endpush
@section('content')
<a class="modal-with-form btn btn-primary mb-3" href="#modalCrearProfesion" id="btnCrear">
    Agregar Profesión <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
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
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $profesion -> nombreprofesion }}</td>
                    <td>
                        <a class="modal-with-form btn btn-primary editar" href="#modalEditarProfesion" data-id="{{$profesion -> idprofesion}}">
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



<!-- Modal Crear Profesion -->
<div class="modal-block modal-block-primary mfp-hide" id="modalCrearProfesion" tabindex="-1" role="dialog" aria-labelledby="modalCrearProfesion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="demo-form" class="form-horizontal" action="{{ url('/profesion') }}" method="post">
                {{ csrf_field() }}
                @include('profesion.form', ['mode' => 'create'])
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Profesion -->
<div class="modal-block modal-block-primary mfp-hide" id="modalEditarProfesion" tabindex="-1" role="dialog" aria-labelledby="modalEditarProfesion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="editar-form" class="form-horizontal" action="/profesion" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                @include('profesion.form', ['mode' => 'edit'])
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
@if (Session::has('requestMethod'))
<script>
    document.getElementById('btnCrear').click();
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
            $('#nombreProfesion').val(data[1]);

            $('#editar-form').attr('action', '/profesion/' + id);
        });
    });
</script>
@endpush