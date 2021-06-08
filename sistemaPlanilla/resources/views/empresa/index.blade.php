@extends('layouts.app')
@push('vendorcss')
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
@endpush
@section('content')
@if (isset($empresa -> codigoempresa))
<section role="main" class="content-body">
    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                <form action="{{ url('/empresa/'.$empresa -> codigoempresa) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    @include('empresa.form', ['mode' => 'edit'])
                </form>
            </section>
        </div>
    </div>
</section>
@else
<section role="main" class="content-body">
    <div class="row">
        <div class="col-xs-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Empresa</h2>
                </header>
                <div class="panel-body p-5">
                    <h1 class="display-3 text-center">
                        <i class="fa fa-warning text-warning"></i> ¡Todavia no se cuenta con una empresa registrada! <i class="fa fa-warning text-warning"></i>
                    </h1>
                    <div class="text-center">
                        <a href="{{ url('/empresa/create') }}" class="btn btn-primary btn-lg text-center mt-5" style="font-size: 25px;">Agregar Empresa</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@endif
@endsection
@push('vendorjs')
<!-- Specific Page Vendor -->
<script src="{{ asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2_locale_es.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('js/profesion.js') }}"></script>
@if (Session::has('mensaje'))
<script type="text/javascript">
    mostrarMensaje('{{ Session::get("mensaje") }}');
</script>
@endif
@endpush