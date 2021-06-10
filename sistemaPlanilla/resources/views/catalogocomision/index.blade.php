<!-- @if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/catalogocomision/create') }}">Agregar Tipo Documento</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nombre Comision</th>
            <th>Porcentaje</th>
            <th>Valor Minimo</th>
            <th>Valor Maximo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($catalogoComisions as $catalogoComision)
            <tr>
                <td>{{ $catalogoComision -> idcatalogocomision }}</td>
                <td>{{ $catalogoComision -> nombrecomision }}</td>
                <td>{{ $catalogoComision -> porcentaje }}</td>
                <td>{{ $catalogoComision -> valmincomision }}</td>
                <td>{{ $catalogoComision -> valmaxcomision }}</td>
                <td>
                    <a href="{{ url('/catalogocomision/'.$catalogoComision -> idcatalogocomision.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/catalogocomision/'.$catalogoComision -> idcatalogocomision) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table> -->


<!---da base --->


@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
@endpush
@section('content')
<a class="modal-with-form btn btn-primary mb-3" href="#modalCrearRangoS" id="btnCrear">
    Agregar catalogo <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Catalogos de comisión Registrados</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                <th>ID</th>
            <th>Nombre Comision</th>
            <th>Porcentaje</th>
            <th>Valor Minimo</th>
            <th>Valor Maximo</th>
            <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($catalogoComisions as $catalogoComision)
                <tr class="gradeX">
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $catalogoComision -> nombrecomision }}</td>
                <td>{{ $catalogoComision -> porcentaje }}</td>
                <td>{{ $catalogoComision -> valmincomision }}</td>
                <td>{{ $catalogoComision -> valmaxcomision }}</td>
                    <td class="text-center">
                        <a class="modal-with-form btn btn-primary editar" id="{{'editar'.$catalogoComision -> idcatalogocomision}}" href="#modalEditarRangoS" data-id="{{$catalogoComision -> idcatalogocomision}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba'.$catalogoComision -> idcatalogocomision }}" class="btn btn-danger p-0" method="post" action="{{ url('/rangosalarial/'.$catalogoComision -> idcatalogocomision) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $catalogoComision -> idcatalogocomision}}', '{{ $catalogoComision -> valmincomision }} hasta {{ $catalogoComision -> valmaxcomision }}','el tipo comisión ')">
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



<!-- Modal Crear Rango Salarial -->
<div class="modal-block modal-block-primary mfp-hide" id="modalCrearRangoS" tabindex="-1" role="dialog" aria-labelledby="modalCrearRangoS" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="demo-form" class="form-horizontal" action="{{ url('/catalogocomision') }}" method="post">
                {{ csrf_field() }}
                @include('catalogocomision.form', ['mode' => 'create'])
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Rango Salarial -->
<div class="modal-block modal-block-primary mfp-hide" id="modalEditarRangoS" tabindex="-1" role="dialog" aria-labelledby="modalEditarRangoS" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="editar-form" class="form-horizontal" action="/catalogocomision" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                @include('catalogocomision.form', ['mode' => 'edit'])
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
            $('#nombreComision').val(data[1]);
            $('#porcentaje').val(data[2]);
            $('#valMinComision').val(data[3]);
            $('#valMaxComision').val(data[4]);

            $('#editar-form').attr('action', '/catalogocomision/' + id);
            if (('editar'.$id) == "{{Session::get('peticion')}}") {
                document.getElementById("{{'error'.Session::get('peticion')}}").style.display = 'block';
            } else {
                document.getElementById("{{'error'.Session::get('peticion')}}").style.display = 'none';
            }
        });
    });
</script>
@endpush