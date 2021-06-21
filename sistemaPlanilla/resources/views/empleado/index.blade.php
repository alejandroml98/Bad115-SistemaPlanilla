@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
@endpush
@section('content')
<a class="btn btn-primary mb-3" href="{{ route('register') }}" id="btnCrear">
    Agregar Empleado <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Empleados Registrados</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Puesto</th>
                    <th>estado</th>
                    <th>Correo Empresarial</th>
                    <th style="width: 1%;">Acciones</th>
                </tr>
            </thead>
            <tbody>                
                @foreach ($empleados as $empleado)                                
                <tr class="gradeX">
                    <td>{{ $empleado -> codigoempleado }}</td>
                    <td>{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}</td>
                    <td>{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}</td>
                    @foreach ($puestos as $puesto)
                    @if ($puesto -> codigopuesto == $empleado -> codigopuesto)
                    <td>{{ $puesto -> nombrepuesto }}</td>
                    @endif
                    @endforeach
                    @if ($empleado->usuario->activo==true)
                    <td class="success">Activo</td>    
                    @else
                    <td class="danger">Inactivo</td>    
                    @endif
                    
                    <td>{{ $empleado -> correoempresarial }}</td>
                    <td class="text-center">
                        <a href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>                        
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