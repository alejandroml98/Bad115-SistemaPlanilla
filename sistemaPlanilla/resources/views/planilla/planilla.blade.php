<!-- 
    Les haré un favorcito, aquí tienen las siguientes cosas para esta vista:
    
    $planilla que es una array de arrays, los internos se componen así...
    [codigoEmpleado, salario, [Descuentos Agrupados], totalDescuentos, [Ingresos Agrupados], 
    totalIngresos, salarioNeto] 
    los [] son arrays internos de los arrays del array
    OJO: NO PUEDEN ACCEDE ASÍ A LOS ATRIBUTOS $planilla -> xxxxxx porque es un array
    no una colección, por eso me baso en las posiciones del array

    OJO 2: Como hago que coincidan los ingresos y descuentos? porque están en un orden específico,
    es decir por ejemplo se que descuento[0] es renta, entonces se que todos los empleados el primer
    descuento será la renta.

    $totalTipoIngresos que es el total general de cada tipo de ingreso, por ejemplo la suma de todas las bonificaciones    
    $totalTipoDescuentos que es el total general de cada tipo de descuento, por ejemplo la suma de todas las rentas

    $totalIngresos que es el total general de TODOS los ingresos osea la suma de los totales de cada empleado
    $totalDescuentos que es el total general de TODOS los descuentos osea la suma de los totales de cada empleado

    $totalAPagarUnidad que es el total de TODOOOOOO o en otras palabras la suma de los salarios netos
    $totalSalarios la suma de todos los salarios brutos
    $totalEmpleados el total de los empleados

    $tipoIngresos que es...
    Todos los tipo ingresos de la tabla TipoIngresos es decir idtipoingreso, nombretipoingresos y así...

    $tipoDescuento que es...
    Todos los tipo ingresos de la tabla TipoDescuento es decir idtipodescuento, nomretipodescuento y así...

    $unidad que es la unidad de la planilla    
    
-->
@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/pnotify/pnotify.custom.css') }}" />
@endpush
@section('content')
<a class=" btn btn-primary mb-3" href="{{ route('planilla.unidades') }}">Regresar</a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Planilla para la unidad de: {{ $unidad -> nombreunidad }}</h2>
    </header>
    <div class="panel-body" lang="es" style="overflow: scroll;">
        <table class="table table-bordered table-striped mb-none table-hover" id="datatable-tabletools">
            <thead>
                <tr>
                    <th>Código Empleado</th>
                    <th>Nombre Empleado</th>
                    <th>Salario</th>
                    @foreach ($tipoDescuentos as $tipoD)
                        <th>{{ $tipoD -> nombretipodescuento }}</th>
                    @endforeach
                    <th>Total Descuentos</th>
                    @foreach ($tipoIngresos as $tipoI)
                        <th>{{ $tipoI -> nombretipoingresos }}</th>
                    @endforeach
                    <th>Total Ingresos</th>
                    <th>Salario Neto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($planilla as $empleado)
                <tr class="gradeX text-center">
                    <td><a class="text-decoration-none text-bold" href="{{ url('/planilla/'.$empleado[0].'/boletapago') }}">{{ $empleado[0] }}</a></td>
                    <td>{{ $empleado[1] }}</td>
                    <td>{{ $empleado[2] }}</td>                                  
                    @foreach ($empleado[3] as $descuento)
                        <td>{{ $descuento }}</td>
                    @endforeach
                    <td>{{ $empleado[4] }}</td>
                    @foreach ($empleado[5] as $ingreso)
                        <td>{{ $ingreso }}</td>
                    @endforeach
                    <td>{{ $empleado[6] }}</td>
                    <td>{{ $empleado[7] }}</td>
                </tr>
                @endforeach
                <tr class="table-success text-center">
                    <td class="text-bold text-center">TOTALES</td>
                    <td>Empleados: {{ $totalEmpleados }}</td>
                    <td>{{ $totalSalarios }}</td>
                    @foreach ($totalTipoDescuentos as $tipoDescuento)
                           <td>{{ $tipoDescuento }}</td>
                    @endforeach
                    <td>{{ $totalDescuentos }}</td>
                    @foreach ($totalTipoIngresos as $tipoIngreso)
                           <td>{{ $tipoIngreso }}</td>
                    @endforeach
                    <td>{{ $totalIngresos }}</td>
                    <td>{{ $totalAPagarUnidad }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection

@push('vendorjs')
<script src="{{ asset('assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2_locale_es.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js') }}"></script>
<script src="{{ asset('assets/javascripts/tables/examples.datatables.default.js') }}"></script>
<script src="{{ asset('assets/vendor/pnotify/pnotify.custom.js') }}"></script>
<script src="{{ asset('assets/javascripts/ui-elements/examples.modals.js') }}"></script>
<script src="{{ asset('assets/javascripts/tables/examples.datatables.tabletools.js') }}"></script>
<script src="{{ asset('js/profesion.js') }}"></script>
@if (Session::has('mensaje'))
<script type="text/javascript">
    mostrarMensaje('{{ Session::get("mensaje") }}');
</script>
@endif
@endpush