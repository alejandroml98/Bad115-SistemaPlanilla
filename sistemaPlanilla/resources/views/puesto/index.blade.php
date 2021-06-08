@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
@endpush
@section('content')
<a class="btn btn-primary mb-3" href="{{ url('/puesto/create') }}" id="btnCrear">
    Agregar Puesto <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Puestos Registrados</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Código</th>
                    <th class="w-25">Puesto</th>
                    <th style="width: 1%;">¿Administrativo?</th>
                    <th class="w-25">Salario Mínimo - Salario Máximo</th>
                    <th style="width: 1%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puestos as $puesto)
                <tr class="gradeX">
                    <td>{{ $puesto -> codigopuesto }}</td>
                    <td>{{ $puesto -> nombrepuesto }}</td>
                    @if ($puesto -> esadministrativo == '1')
                    <td class="text-center text-success text-bold" style="font-size: 20px;">&#x2713;</td>
                    @else
                    <td class="text-center text-danger text-bold" style="font-size: 20px;">&#x2717;</td>
                    @endif
                    @foreach ($rangosSalariales as $rangoSalarial)
                    @if ($rangoSalarial -> idrangosalarial == $puesto -> idrangosalarial)
                    <td>${{ $rangoSalarial -> salariominimo }} - ${{ $rangoSalarial -> salariomaximo }}</td>
                    @endif
                    @endforeach
                    <td class="text-center">
                        <a href="{{ url('/puesto/'.$puesto -> codigopuesto.'/edit') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba'.$puesto -> codigopuesto }}" class="btn btn-danger p-0" method="post" action="{{ url('/puesto/'.$puesto -> codigopuesto) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $puesto -> codigopuesto}}', '{{ $puesto -> nombrepuesto }}','el puesto')">
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