@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
@endpush
@section('content')
<a class="modal-with-form btn btn-primary mb-3" href="#modalCrearCentroC" id="btnCrear">
Agregar Presupuesto Inicial <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Presupuestos Registrados</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="w-75">Presupuesto Inicial</th>
                    <th style="width: 1%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($centroCostos as $centroCosto)
                <tr class="gradeX">
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $centroCosto -> presupuestoinicial }}</td>
                    <td class="text-center">
                        <a class="modal-with-form btn btn-primary editar" id="{{'editar'.$centroCosto -> idcentrocostos}}" href="#modalEditarCentroC" data-id="{{$centroCosto -> idcentrocostos}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba'.$centroCosto -> idcentrocostos }}" class="btn btn-danger p-0" method="post" action="{{ url('/centrocostos/'.$centroCosto -> idcentrocostos) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $centroCosto -> idcentrocostos}}', '{{ $centroCosto -> presupuestoinicial }}','el centro de costos con presupuesto')">
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



<!-- Modal Crear Centro Costos -->
<div class="modal-block modal-block-primary mfp-hide" id="modalCrearCentroC" tabindex="-1" role="dialog" aria-labelledby="modalCrearCentroC" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="demo-form" class="form-horizontal" action="{{ url('/centrocostos') }}" method="post">
                {{ csrf_field() }}
                @include('centrocostos.form', ['mode' => 'create'])
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Centro Costos -->
<div class="modal-block modal-block-primary mfp-hide" id="modalEditarCentroC" tabindex="-1" role="dialog" aria-labelledby="modalEditarCentroC" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="editar-form" class="form-horizontal" action="/centrocostos" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                @include('centrocostos.form', ['mode' => 'edit'])
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
            $('#presupuestoInicial').val(data[1]);

            $('#editar-form').attr('action', '/centrocostos/' + id);
            if (('editar'.$id) == "{{Session::get('peticion')}}") {
                document.getElementById("{{'error'.Session::get('peticion')}}").style.display = 'block';
            } else {
                document.getElementById("{{'error'.Session::get('peticion')}}").style.display = 'none';
            }
        });
    });
</script>
@endpush