<!-- @if (count($errors) > 0)
    <h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </h3>
@endif
<h2>
    @if ($mode == 'create')
        {{ 'Agregar Descuento para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
    @else
        {{ 'Modificar Descuento para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
    @endif
</h2>

@if ($mode == 'create')    
    <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
    <select name="idTipoDescuento" id="idTipoDescuento">
        <option value="" selected disabled>Seleccione el tipo de descuento</option>
        @foreach ($tiposDescuentos as $tipoDescuento)
            <option value="{{ $tipoDescuento -> idtipodescuento }}">{{ $tipoDescuento -> nombretipodescuento }}</option>
        @endforeach
    </select>
    <label for="valorTipoDescuentoEmpleado">{{ 'Valor del descuento (%)' }}</label>
    <input type="number" step=".01" min="0" max="999999.99" name="valorTipoDescuentoEmpleado" id="valorTipoDescuentoEmpleadoCreate" value="{{ old('valorTipoDescuentoEmpleadoCreate') }}">
    <label for="contadorTipoDescuentoEmpleado">{{ 'Contador Tipo Descuento Empleado' }}</label>
    <input type="number" step="1" min="0" name="contadorTipoDescuentoEmpleado" id="contadorTipoDescuentoEmpleadoCreate" value="{{ old('contadorTipoDescuentoEmpleadoCreate') }}">
@else    
    <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
    <select name="idTipoDescuento" id="idTipoDescuento">        
        @foreach ($tiposDescuentos as $tipoDescuento)
            @if ($tipoDescuentoEmpleado -> idtipodescuento == $tipoDescuento -> idtipodescuento)
                <option value="{{ $tipoDescuento -> idtipodescuento }}" selected>{{ $tipoDescuento -> nombretipodescuento }}</option>
            @else
            <option value="{{ $tipoDescuento -> idtipodescuento }}">{{ $tipoDescuento -> nombretipodescuento }}
            @endif            
        @endforeach
    </select>
    <label for="valorTipoDescuentoEmpleado">{{ 'Valor del descuento (%)' }}</label>
    <input type="number" step=".01" min="0" max="999999.99" name="valorTipoDescuentoEmpleado" id="valorTipoDescuentoEmpleado" value="{{ isset($tipoDescuentoEmpleado -> valortipodescuentoempleado) ? $tipoDescuentoEmpleado -> valortipodescuentoempleado : old('valorTipoDescuentoEmpleado') }}">
    <label for="contadorTipoDescuentoEmpleado">{{ 'Contador Tipo Descuento Empleado' }}</label>
    <input type="number" step="1" min="0" name="contadorTipoDescuentoEmpleado" id="contadorTipoDescuentoEmpleado" value="{{ isset($tipoDescuentoEmpleado -> contadortipodescuentoempleado) ? $tipoDescuentoEmpleado -> contadortipodescuentoempleado : old('contadorTipoDescuentoEmpleado') }}">
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}">REGRESAR</a>


 -->


<!----dfsd-->

@extends('layouts.app')
@push('vendorcss')
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
@endpush
@section('content')
@if (count($errors) > 0)
<h3>
    <ul>
        @foreach ($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
</h3>
@endif
<div class="col-xs-12">
        
            <header class="panel-heading">
            @if ($mode == 'create')
            <h2 class="panel-title">   {{ 'Agregar Descuento para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}</h2>
            @else
    <h2 class="panel-title">    {{ 'Modificar Descuento para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}</h2>
            @endif
              
            </header>
            <section class="panel">
            <div class="panel-body p-5">

            
<div class="row">

@if ($mode == 'create')    
<div class="col-md-4 mb-3">
<input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
<label for="idTipoDescuento">{{ 'TIpo de descuento' }}</label>
    <select required data-plugin-selectTwo class="form-control populate" name="idTipoDescuento" id="idTipoDescuento">
        <option value="" selected >Seleccione el tipo de descuento</option>
        @foreach ($tiposDescuentos as $tipoDescuento)
            <option value="{{ $tipoDescuento -> idtipodescuento }}">{{ $tipoDescuento -> nombretipodescuento }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4 mb-3">
<label for="valorTipoDescuentoEmpleado">{{ 'Valor del descuento (%)' }}</label>
    <input class="form-control" type="number" step=".01" min="0" max="999999.99" name="valorTipoDescuentoEmpleado" id="valorTipoDescuentoEmpleadoCreate" value="{{ old('valorTipoDescuentoEmpleadoCreate') }}">
</div>
<div class="col-md-4 mb-3">
<label for="contadorTipoDescuentoEmpleado">{{ 'Contador Tipo Descuento Empleado' }}</label>
    <input  class="form-control" type="number" step="1" min="0" name="contadorTipoDescuentoEmpleado" id="contadorTipoDescuentoEmpleadoCreate" value="{{ old('contadorTipoDescuentoEmpleadoCreate') }}">
</div>
</div>
@else 
<div class="col-md-4 mb-3">
<label for="idTipoDescuento">{{ 'TIpo de descuento' }}</label>
<input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}" data-plugin-selectTwo class="form-control populate">
    <select required data-plugin-selectTwo class="form-control populate" name="idTipoDescuento" id="idTipoDescuento">        
        @foreach ($tiposDescuentos as $tipoDescuento)
            @if ($tipoDescuentoEmpleado -> idtipodescuento == $tipoDescuento -> idtipodescuento)
                <option value="{{ $tipoDescuento -> idtipodescuento }}" selected>{{ $tipoDescuento -> nombretipodescuento }}</option>
            @else
            <option value="{{ $tipoDescuento -> idtipodescuento }}">{{ $tipoDescuento -> nombretipodescuento }}
            @endif            
        @endforeach
    </select>
</div>
<div class="col-md-4 mb-3">
<label for="valorTipoDescuentoEmpleado">{{ 'Valor del descuento (%)' }}</label>
    <input class="form-control" type="number" step=".01" min="0" max="999999.99" name="valorTipoDescuentoEmpleado" id="valorTipoDescuentoEmpleado" value="{{ isset($tipoDescuentoEmpleado -> valortipodescuentoempleado) ? $tipoDescuentoEmpleado -> valortipodescuentoempleado : old('valorTipoDescuentoEmpleado') }}">
</div>
<div class="col-md-4 mb-3">
<label for="contadorTipoDescuentoEmpleado">{{ 'Contador Tipo Descuento Empleado' }}</label>
    <input class="form-control" type="number" step="1" min="0" name="contadorTipoDescuentoEmpleado" id="contadorTipoDescuentoEmpleado" value="{{ isset($tipoDescuentoEmpleado -> contadortipodescuentoempleado) ? $tipoDescuentoEmpleado -> contadortipodescuentoempleado : old('contadorTipoDescuentoEmpleado') }}">
</div>
@endif
<div class="row">
<div class="col-md-12 mb-3">
<input  class="btn btn-primary" type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a class="btn btn-danger" href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}">Cancelar</a>
</div>
</div>
</section>
</div>
</div>

@endsection
@push('vendorjs')
<!-- Specific Page Vendor -->
<script src="{{ asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/select2_locale_es.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="js/profesion.js"></script>
@if (Session::has('mensaje'))
<script type="text/javascript">
    mostrarMensaje('{{ Session::get("mensaje") }}');
</script>
@endif
@endpush