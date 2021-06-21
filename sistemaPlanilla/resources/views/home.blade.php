@extends('layouts.app')
@section('content')
@push('vendorcss')
<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
@endpush
@role('admin')
<div class="row">
    <div class="col-md-6">        
        <div class="panel-group" id="accordion2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a>
                            <i class="fa fa-star"></i> ¡Bienvenido al sistema de Planilla Across!
                        </a>
                    </h4>
                </div>
                <div id="collapse2One" class="panel-body">
                    <div class="panel-body">
                        Te recomendamos que tengas actualizada tu información en el sistema. 
                        Con Across puedes personalizar tu experiencia, eligiendo los parámetros con los que quieras guardar y rastrear tus datos a través de tus catálogos de información dinámicos.                
                    </div>
                </div>
            </div>
            <div class="panel panel-accordion panel-accordion-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Two">
                            <i class="fa fa-cogs"></i> Si son tus primeros pasos ...
                        </a>
                    </h4>
                </div>
                <div id="collapse2Two" class="accordion-body collapse">
                    <div class="panel-body">
                        Si recién comienzas a utilizar Across comienza configurando tu información de empresa, puedes hacerlo <a href="{{ url('/empresa/create') }}" class="btn btn-xs btn-success">aquí</a>
                        luego ingresa en el sistema tus propias configuraciones como profesiones, paises, catálogos de género, estado civil, descuentos etc. Encuentra tus enlaces directos en la barra de navegación lateral. 
                    </div>
                </div>
            </div>
            <div class="panel panel-accordion panel-accordion-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Three">
                            <i class="fa fa-warning"></i> Recuerda...
                        </a>
                    </h4>
                </div>
                <div id="collapse2Three" class="accordion-body collapse">
                    <div class="panel-body">
                        La información siempre se relaciona entre si, por lo que muchas veces es necesario introducir ciertos parámetros antes que otros. Aseguráte de configurar antes tu información general para evitar futuros inconvenientes.
                    </div>
                </div>
            </div>            
        </div>
        
    </div>
    <div class="col-md-6">
		<div class="row">
			<div class="col-md-6 col-xl-12">
				<section class="panel">
					<div class="panel-body bg-primary">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon">
									<i class="fa fa-life-ring"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h4 class="title">Empresa</h4>
									<div class="info">
										<strong class="amount" name="nomEmpresa"></strong>
									</div>
								</div>
								<div class="summary-footer">
									<a href="{{ route('empresa.index') }}" class="text-uppercase">(Ver empresa)</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="col-md-6 col-xl-12">
				<section class="panel">
					<div class="panel-body bg-tertiary">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon">
									<i class="fa fa-life-ring"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h4 class="title">Empleados</h4>
								    <div class="info">
								        <strong name="cantEmpleados" class="amount"></strong>
							        </div>
						        </div>
						        <div class="summary-footer">
							        <a href="{{ route('empleado.index') }}" class="text-uppercase">(Agregar Empleados)</a>
						        </div>
					        </div>
				        </div>
				    </div>
				</section>
			</div>
		</div>
    </div>    
</div>
<div class="row">
    <div class="col-md-6">
        @include('empleado.frontindex')
    </div>
</div>
</div>    
@else
    <h1>¡Bienvenido!</h1>    

@endrole

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
<script>
    $(function() {                                    
        var url = "{{ route('user.empresa') }}";
        $.get(url, function(data) {
            var span = $('strong[name=nomEmpresa]');            
            span.append(data);                                                      
        });                                    
    });

    $(function() {                                    
        var url = "{{ url('/numempleados') }}";
        $.get(url, function(data) {
            var span = $('strong[name=cantEmpleados]');            
            span.append(data);                                                      
        });                                    
    });
</script>
@endpush
