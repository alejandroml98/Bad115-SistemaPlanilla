<!-- @if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/region/create') }}">Agregar Region</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Región</th>
            <th>País</th>        
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($regiones as $region)
            <tr>
                <td>{{ $region -> idregion }}</td>
                <td>{{ $region -> nombreregion }}</td>
                @foreach ($paises as $pais)
                    @if ($region -> idpais == $pais -> idpais)
                        <td>{{ $pais -> nombrepais }}</td>                        
                    @endif
                @endforeach
                <td>
                    <a href="{{ url('/region/'.$region -> idregion.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/region/'.$region -> idregion) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table> -->
<!---->
@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
@endpush
@section('content')
<a class=" btn btn-primary mb-3"  href="{{ url('/region/create') }}" id="btnCrear">
    Agegar Región <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Regiones Registradas</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                <th>ID</th>
            <th>Región</th>
            <th>País</th>        
            <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
           
                    
                     @foreach ($regiones as $region)
                     <tr class="gradeX">
                <td>{{ $loop -> iteration }}</td>
                <td>{{ $region -> nombreregion }}</td>
                @foreach ($paises as $pais)
                    @if ($region -> idpais == $pais -> idpais)
                        <td>{{ $pais -> nombrepais }}</td>                        
                    @endif
                    
                @endforeach
                <td class="text-center">
                        <a class=" btn btn-primary editar"   href="{{ url('/region/'.$region -> idregion.'/edit') }}" class="btn btn-warning">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba'.$region -> idregion }}" class="btn btn-danger p-0" method="post" action="{{ url('/region/'.$region -> idregion) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $region -> idregionl}}', '{{ $region -> nombreregion}} ',' La región ')">
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
