@extends('layouts.app')
@push('vendorcss')
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />
@endpush
@section('content')
<form action="{{ url('/empleado/'.$empleado -> codigoempleado) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('empleado.form', ['mode' => 'edit'])    
</form>
<!-- Seccion Cuentas Bancarias -->
<h1>CUENTAS BANCARIAS ASOCIADAS</h1>
<a href="{{ url('/cuentabancaria/create', [$empleado -> codigoempleado]) }}">Agregar Cuenta Bancaria</a>
@include('cuentabancaria.index')
<!-- Seccion Documentos -->
<h1>DOCUMENTOS ASOCIADOS</h1>
<a href="{{ url('/tipodocumentoempleado/create', [$empleado -> codigoempleado]) }}">Agregar Documento</a>
@include('tipodocumentoempleado.index')
<!-- Seccion Descuentos -->
<h1>DESCUENTOS DESIGNADOS</h1>
<a href="{{ url('/tipodescuentoempleado/create', [$empleado -> codigoempleado]) }}">Agregar Descuento</a>
@include('tipodescuentoempleado.index')
<!-- Seccion Ingresos -->
<h1>INGRESOS GENERADOS</h1>
<a href="{{ url('/tipoingresosempleado/create', [$empleado -> codigoempleado]) }}">Agregar Ingreso</a>
@include('tipoingresoempleado.index')
<!-- Seccion Ingresos -->
<h1>PROFESIONES</h1>
<a href="{{ url('/profesionempleado/create', [$empleado -> codigoempleado]) }}">Agregar Profesion</a>
@include('profesionempleado.index')
<!-- Seccion Unidades -->
<h1>UNIDADES EN LAS QUE PARTICIPA</h1>
<a href="{{ url('/unidadempleado/create', [$empleado -> codigoempleado]) }}">Agregar Unidad</a>
@include('unidadempleado.index')
@endsection
@push('vendorjs')
<!-- Specific Page Vendor -->
<script src="{{ asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2_locale_es.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
@endpush