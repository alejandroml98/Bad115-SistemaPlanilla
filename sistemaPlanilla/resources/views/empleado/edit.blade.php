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
					<a href="#documentosotros" data-toggle="tab">Documentos y Finanzas</a>
				</li>  
                <li>
					<a href="#informacion" data-toggle="tab">Información Empresarial</a>
				</li>
                @if ($empleado->usuario->activo==true)
                <li>
					<a id="desactivarUsuario" onclick="desactivar({{$empleado->usuario->id}})" class="bg-success text-dark" data-toggle="tab">Activo</a>
				</li>				              
                @else
                <li>
					<a id="activarUsuario" onclick="activar({{$empleado->usuario->id}})" class="bg-danger text-dark" data-toggle="tab">Inactivo</a>
				</li>				              
                @endif                
			</ul>
			<div class="tab-content">
				<div id="informacion" class="tab-pane">
                    <!-- Seccion Cuentas Bancarias -->
                    @include('cuentabancaria.index')
                    <!-- Seccion Profesiones -->
                    @include('profesionempleado.index')
                    <!-- Seccion Unidades -->
                    @include('unidadempleado.index')
                </div>
                <div id="documentosotros" class="tab-pane">
                    <!-- Seccion Documentos -->
                    @include('tipodocumentoempleado.index')
                    <!-- Seccion Descuentos -->
                    @include('tipodescuentoempleado.index')
                    <!-- Seccion Ingresos -->
                    @include('tipoingresoempleado.index')
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
<script src="{{ asset('js/profesion.js') }}"></script>
@if (Session::has('mensaje'))
<script type="text/javascript">
    mostrarMensaje('{{ Session::get("mensaje") }}');
</script>
@endif
@endpush
<script>
    function rangoSalarial(codigopuesto){
        //console.log(codigopuesto.value); 
        var puestos = @json($puestos);
        puestos.forEach(element => {
            if (element.codigopuesto === codigopuesto.value){
                document.getElementById('salario').value= element.rango_salario.salariominimo
                document.getElementById('salario').min=element.rango_salario.salariominimo
                document.getElementById('salario').max=element.rango_salario.salariomaximo
                
            };
            
        });        
        //console.log( codigopuesto.value);          
    }

    
    
</script>