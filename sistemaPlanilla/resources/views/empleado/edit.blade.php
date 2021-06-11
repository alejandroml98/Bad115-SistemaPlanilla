@extends('layouts.app')
@push('vendorcss')
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />
@endpush
@section('content')
<section role="main" class="content-body">
<div class="row">
	<div class="col-md-12">
		<div class="tabs tabs-primary">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#datosper" data-toggle="tab"><i class="fa fa-star"></i> Datos Personales</a>
				</li>
				<li>
					<a href="#documentosotros" data-toggle="tab">Documentos y otros</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="documentosotros" class="tab-pane">
                    <!-- Seccion Cuentas Bancarias -->
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
                </div>
				<div id="datosper" class="tab-pane active">
                    <form action="{{ url('/empleado/'.$empleado -> codigoempleado) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        @include('empleado.form', ['mode' => 'edit'])
                    </form>
                </div>
            </div>			    
		</div>
	</div>
</section>
@endsection
@push('vendorjs')
<!-- Specific Page Vendor -->
<script src="{{ asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2_locale_es.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js') }}"></script>
<script src="{{ asset('assets/javascripts/tables/examples.datatables.default.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
@endpush