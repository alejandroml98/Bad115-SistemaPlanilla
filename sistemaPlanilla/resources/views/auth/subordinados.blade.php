<!-- <h1>Subordinados de {{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}</h1>
<h2>Unidad - {{ $unidad -> nombreunidad }}</h2>
<ul>
    @foreach ($subordinados as $subordinado)
        @foreach ($puestos as $puesto)
            @if ($puesto -> codigopuesto == $subordinado -> codigopuesto)
                <li>{{ $subordinado -> codigoempleado }}-{{ $subordinado -> primernombre }}{{ ' ' }}{{ $subordinado -> apellidopaterno }}-{{ $puesto -> nombrepuesto }}</li>
            @endif
        @endforeach        
    @endforeach
</ul> -->


@extends('layouts.app')
@push('vendorcss')

<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />
@endpush
@section('content')
<a class=" btn btn-primary mb-3" href="{{url()->previous()}}" id="btnCrear">
    Regresar</a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Subordinados de {{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}</h2>
    </header>
    <!-- Modal -->
   
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                <th>ID</th>
            <th>Unidad</th>
            <th>Código</th>
            <th>Empleado</th>
            <th>Puesto </th>
           
                </tr>
            </thead>
            <tbody>
            @foreach ($subordinados as $subordinado)
                <tr class="gradeX">
                    <td>{{ $loop -> iteration }}</td>
                <td>{{ $unidad -> nombreunidad }}</td>
                @foreach ($puestos as $puesto)
            @if ($puesto -> codigopuesto == $subordinado -> codigopuesto)
                <td>{{ $subordinado -> codigoempleado }}</td>
                <td>{{ $subordinado -> primernombre }}{{ ' ' }}{{ $subordinado -> apellidopaterno }}</td>
                <td>{{ $puesto -> nombrepuesto }}</td>
            @endif
        @endforeach  
                  
                @endforeach
            </tbody>
        </table>
    </div>
</section>


@endsection
@push('vendorjs')
<script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
   
    <script src="{{ asset('assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
<script src="{{asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
<script src="{{asset('assets/vendor/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/select2/select2_locale_es.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
<script src="{{asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>

<script src="{{asset('js/profesion.js')}}"></script>
@endpush