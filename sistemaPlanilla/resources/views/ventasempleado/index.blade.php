@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
@endpush
@section('content')
<a class="btn btn-primary mb-3" href="{{ url('/ventasempleado/create') }}" id="btnCrear">
    Agregar Ventas <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Ventas Registradas</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Codigo del Empleado</th>
                    <th>Valor de las Ventas</th>
                    <th>Fecha de Venta</th>
                    <th style="width: 1%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventasEmpleados as $ventaEmpleado)
                <tr class="gradeX">
                    <td>{{ $loop -> iteration }}</td>
                    @foreach ($empleados as $empleado)
                    @if ($ventaEmpleado -> codigoempleado == $empleado -> codigoempleado)
                    <td>{{ $empleado -> codigoempleado }}</td>
                    @endif
                    @endforeach
                    <td>{{ $ventaEmpleado -> valorventa }}</td>
                    <td>{{ date('d/m/Y', strtotime($ventaEmpleado -> fechaventa)) }}</td>
                    <td class="text-center">
                        <a href="{{ url('/ventasempleado/'.$ventaEmpleado -> idventasempleado.'/edit') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba'.$ventaEmpleado -> idventasempleado }}" class="btn btn-danger p-0" method="post" action="{{ url('/ventasempleado/'.$ventaEmpleado -> idventasempleado) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $ventaEmpleado -> idventasempleado }}', 'por {{ $ventaEmpleado -> valorventa }} del empleado {{ $ventaEmpleado -> codigoempleado }}','la venta')">
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
@endpush