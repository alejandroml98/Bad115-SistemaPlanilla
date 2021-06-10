

@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
@endpush
@section('content')
<a class=" btn btn-primary mb-3" href="{{ url('/pais/create') }}" id="btnCrear">
    Agregar Pais <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Paises Registrados</h2>
    </header>
    <!-- Modal -->

    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                <th>ID</th>
            <th>País</th>
            <th>Tipo Region</th>
            <th>Tipo SubRegion</th>
            <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($paises as $pais)
                <tr class="gradeX">
                    <td>{{ $loop -> iteration }}</td>
                <td>{{ $pais -> nombrepais }}</td>
                @foreach ($tiposRegion as $tipoRegion)
                    @if ($pais -> idtiporegion == $tipoRegion -> idtiporegion)
                        <td>{{ $tipoRegion -> nombretiporegion }}</td>
                        <td>{{ $tipoRegion -> nombretiposubregion }}</td>
                    @endif
                @endforeach
                    <td class="text-center">
                        <a class=" btn btn-primary editar" id="{{'editar'.$pais -> idpais}}" href="{{ url('/pais/'.$pais -> idpais.'/edit') }}" data-id="{{$pais -> idpais }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form  id="{{ 'formulario-prueba'.$pais -> idpais  }}" class="btn btn-danger p-0" method="post" action="{{ url('/pais/'.$pais -> idpais ) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $pais -> idpais }}', '{{ $pais -> nombrepais }}',' el pais')">
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
            $('#nombrePais').val(data[1]);
            $('#valMax').val(data[2]);
           

            $('#editar-form').attr('action', '/pais/' + id);
            if (('editar'.$id) == "{{Session::get('peticion')}}") {
                document.getElementById("{{'error'.Session::get('peticion')}}").style.display = 'block';
            } else {
                document.getElementById("{{'error'.Session::get('peticion')}}").style.display = 'none';
            }
        });
    });
</script>

@endpush