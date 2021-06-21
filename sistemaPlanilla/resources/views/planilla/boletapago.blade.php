<!-- 
    Les haré un favorcito, aquí tienen las siguientes cosas para esta vista:
    
    $boletaPago que se compone de...
    Código Empleado, Nombre Empleado + Apellido, Salario, Un array con los totales agrupados de descuentos,
    El total general de los descuentos, Un array con los totales agrupados de ingresos, el total general de ingresos,
    y el salario neto

    Así se formó el array para que tengan una mejor idea

            [0]array_push($boletaPago, $emp -> codigoempleado);
            [1]array_push($boletaPago, $emp -> primernombre.' '.$emp -> apellidopaterno);
            [2]array_push($boletaPago, $salario);
            [3]array_push($boletaPago, $totalDescuentosEmpleado);
            [4]array_push($boletaPago, $totalDescuentosEmpleadoActual);
            [5]array_push($boletaPago, $totalIngresosEmpleado);
            [6]array_push($boletaPago, $totalIngresosEmpleadoActual);
            [7]array_push($boletaPago, $salarioNetoEmpleado);

    $tipoIngresos que es...
    Todos los tipo ingresos de la tabla TipoIngresos es decir idtipoingreso, nombretipoingresos y así...

    $tipoDescuentos que es...
    Todos los tipo ingresos de la tabla TipoDescuento es decir idtipodescuento, nomretipodescuento y así...

    $unidad que es la unidad del empleado
    $unidadPrincipal que es la unidad padre, si la tiene, si no es null

    $emp que es el empleado seleccionado
    $empresa que es la empresa, alejandro dijo que lo pasara pero no sé exactamente para que
-->
@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/pnotify/pnotify.custom.css') }}" />
@endpush
@section('content')
<a class=" btn btn-primary mb-3" href="{{ route('home') }}">Ir a Inicio</a>
<section class="panel" id="Imprimir">
    <div class="panel-body">
        <div class="invoice">
            <header class="clearfix">
                <div class="row">
                    <div class="col-sm-6 mt-md">
                        <h2 class="h2 mt-none mb-sm text-dark text-bold">Boleta de Pago</h2>
                        <h4 class="h4 m-none text-dark text-bold">{{ $emp -> codigoempleado }}</h4>
                    </div>
                    <div class="col-sm-6 text-right mt-md mb-md">
                        <address class="ib mr-xlg">
                            {{ $empresa -> nombreempresa }}
                            <br/>
                            {{ $empresa -> paginaweb }}
                            <br/>
                            Tel.: {{ $empresa -> telefonoempresa }}
                            <br/>
                            {{ $empresa -> correoelectronicoempresa }}
                        </address>
                        <div class="ib">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="OKLER Themes" />
                        </div>
                    </div>
                </div>
            </header>
            <div class="bill-info">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bill-to">
                            <p class="h5 mb-xs text-dark text-semibold">Boleta de pago de:</p>
                            <address>
                                {{ $emp -> primernombre. ' ' .$emp -> segundonombre .' '. $emp -> apellidopaterno .' '. $emp -> apellidomaterno .' '. $emp -> apellidocasado }}
                                <br/>
                                {{ $puesto -> nombrepuesto }}
                                <br/>
                                {{ $unidad -> nombreunidad }}                                
                                @if (isset($unidadPrincipal))
                                <br/>
                                    {{ $unidadPrincipal -> nombreunidad }}
                                @endif
                                <br/>
                                {{ $emp -> correoelectronico }}
                                <br/>
                                <br/>
                                <span class="text-dark text-bold mt-3">Salario: ${{ $emp -> salario }}</span>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bill-data text-right">
                            <p class="mb-none">
                                <span class="text-dark">Fecha:</span>
                                <span class="value">{{date('Y-m-d')}}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="table-responsive col-md-6 pr-0">
                    <table class="table invoice-items">
                        <thead>
                            <tr class="h4 text-dark">
                                <th id="cell-id"     class="text-semibold">Descuentos</th>
                                <th id="cell-item" class="text-center text-semibold">Valor</th>
                            </tr>
                        </thead>
                        <tbody>                        
                            @php
                                $nD = 0;
                            @endphp
                            @foreach ($tipoDescuentos as $tipoDescuento)
                                <tr>                            
                                    <td class="text-semibold text-dark">{{ $tipoDescuento -> nombretipodescuento }}</td>
                                    <td class="text-center">${{ $boletaPago[3][$nD] }}</td>                                
                                    @php
                                        $nD++;
                                    @endphp
                                </tr> 
                            @endforeach                                                          
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive col-md-6 pl-0">
                    <table class="table invoice-items">
                        <thead>
                            <tr class="h4 text-dark">
                                <th id="cell-desc"   class="text-semibold">Ingresos</th>
                                <th id="cell-price"  class="text-center text-semibold">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nI = 0;
                            @endphp
                            @foreach ($tipoIngresos as $tipoIngreso)
                                <tr>
                                    <td class="text-semibold text-dark">{{ $tipoIngreso -> nombretipoingresos }}</td>
                                    <td class="text-center">${{ $boletaPago[5][$nI] }}</td>
                                    @php
                                        $nI++;
                                    @endphp
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        
            <div class="invoice-summary">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <table class="table h5 text-dark">
                            <tbody>
                                <tr class="b-top-none">
                                    <td colspan="2">Total Descuentos</td>
                                    <td class="text-left">${{ $boletaPago[4] }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Total Ingresos: </td>
                                    <td class="text-left">${{ $boletaPago[6] }}</td>
                                </tr>
                                <tr class="h4">
                                    <td colspan="2">Total a recibir:</td>
                                    <td class="text-left">${{ $boletaPago[7] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-right mr-lg">
            <a onclick="printThisDiv('Imprimir')" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Imprimir</a>
        </div>
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

<script type="text/javascript">
    var printThisDiv = (id) => {
    var printContents = document.getElementById(id).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContent;
    }
</script>
@endpush