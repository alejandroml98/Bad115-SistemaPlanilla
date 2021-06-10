







@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
@endpush
@section('content')
<a class=" btn btn-primary mb-3" href="{{ url('/direccion/create') }}" id="btnCrear">
    Agregar Renta<i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Rentas Registradas</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                <th>ID</th>
            <th>País</th>
            <th>Region</th>
            <th>Sub Region</th>
            <th>Detalle</th>
            <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($direcciones as $direccion)
                <tr class="gradeX">
                    <td>{{ $loop -> iteration }}</td>
                    @foreach ($subRegiones as $subRegion)
                    @if ($subRegion -> idsubregion == $direccion -> idsubregion)
                        @foreach ($regiones as $region)
                            @if ($region -> idregion == $subRegion -> idregion)
                                @foreach ($paises as $pais)
                                    @if ($pais -> idpais == $region -> idpais)
                                        <td>{{ $pais -> nombrepais }}</td>
                                        <td>{{ $region -> nombreregion }}</td>
                                        <td>{{ $subRegion -> nombresubregion }}</td>
                                        <td>{{ $direccion -> detalledireccion }}</td>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                    @endforeach
                    <td class="text-center">
                        <a class=" btn btn-primary editar" id="{{'editar'. $direccion -> iddireccion }}" href="{{ url('/direccion/'.$direccion -> iddireccion.'/edit') }}"  data-id="{{ $direccion -> iddireccion}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba'. $direccion -> iddireccion  }}" class="btn btn-danger p-0" method="post" action="{{ url('/direccion/'. $direccion -> iddireccion ) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{  $direccion -> iddireccion }}', 'ah gokuuu',' la dirección ')">
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
            $('#valMin').val(data[1]);
            $('#valMax').val(data[2]);
            $('#valorFijo').val(data[3]);
            $('#exceso').val(data[4]);
            $('#periodo').val(data[5]);

            $('#editar-form').attr('action', '/direccion/' + id);
            if (('editar'.$id) == "{{Session::get('peticion')}}") {
                document.getElementById("{{'error'.Session::get('peticion')}}").style.display = 'block';
            } else {
                document.getElementById("{{'error'.Session::get('peticion')}}").style.display = 'none';
            }
        });
    });
</script>
@endpush