
<!--Nuevo-->
@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
@endpush
@section('content')
<a class="modal-with-form btn btn-primary mb-3" href="#modalCrearProfesion" id="btnCrear">
    Agregar Tipo de region <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Tipo de regiones Registradas</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                <th>ID</th>
            <th>Tipo Region</th>
            <th>Tipo SubRegion</th>
            <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($tiposRegion as $tipoRegion)
                <tr class="gradeX">
                    <td>{{ $loop -> iteration }}</td>
                    
                   
                <td>{{ $tipoRegion -> nombretiporegion }}</td>
                <td>{{ $tipoRegion -> nombretiposubregion }}</td>
                    <td class="text-center">
                        <a class="modal-with-form btn btn-primary editar" id="{{'editar'.$tipoRegion -> idtiporegion}}" href="#modalEditarProfesion" data-id="{{$tipoRegion -> idtiporegion}}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba'.$tipoRegion -> idtiporegion }}" class="btn btn-danger p-0" method="post" action="{{ url('/tiporegion/'.$tipoRegion -> idtiporegion) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $tipoRegion -> idtiporegion}}', '{{ $tipoRegion -> nombretiporegion }}','la tipo de regi??n')">
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
            <form id="demo-form" class="form-horizontal" action="{{ url('/tiporegion') }}" method="post">
                {{ csrf_field() }}
                @include('tiporegion.form', ['mode' => 'create'])
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Profesion -->
<div class="modal-block modal-block-primary mfp-hide" id="modalEditarProfesion" tabindex="-1" role="dialog" aria-labelledby="modalEditarProfesion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="editar-form" class="form-horizontal" action="/tiporegion" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                @include('tiporegion.form', ['mode' => 'edit'])
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
            $('#nombreTipoRegion').val(data[1]);
            $('#nombreTipoSubRegion').val(data[2]);

            $('#editar-form').attr('action', '/tiporegion/' + id);
            if (('editar'.$id) == "{{Session::get('peticion')}}") {
                document.getElementById("{{'error'.Session::get('peticion')}}").style.display = 'block';
            } else {
                document.getElementById("{{'error'.Session::get('peticion')}}").style.display = 'none';
            }
        });
    });
</script>
@endpush