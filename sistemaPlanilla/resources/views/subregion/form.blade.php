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
<h2>{{ $mode == 'create' ? 'Agregar Sub Región'  : 'Modificar Sub Región' }}</h2>
<label for="nombreSubRegion">{{ 'Nombre Sub Región' }}</label>
@if ($mode == 'create')
    <input type="text" name="nombreSubRegion" id="nombreSubRegionCreate" value="{{ old('nombreSubRegionCreate') }}">
@else
    <input type="text" name="nombreSubRegion" id="nombreSubRegion" value="{{ isset($subRegion -> nombresubregion) ? $subRegion -> nombresubregion : old('nombreSubRegion') }}">
@endif
<label for="idRegion">{{ 'Región - País' }}</label>
@if ($mode == 'create')
    <select name="idRegion" id="idRegionCreate" required>
        <option value="">Selecciona la región de origen</option>
        @foreach ($regiones as $region)
            @foreach ($paises as $pais)
                @if ($pais -> idpais == $region -> idpais)
                    <option value="{{ $region -> idregion }}">{{ $region -> nombreregion }} - {{ $pais -> nombrepais }}</option>
                @endif                
            @endforeach                        
        @endforeach
    </select>
@else
    <select name="idRegion" id="idRegion" required>
        <option value="">Selecciona el país de origen</option>
        @foreach ($regiones as $region)
            @if (isset($subRegion -> idregion))
                @foreach ($paises as $pais)
                    @if ($pais -> idpais == $region -> idpais && $subRegion -> idregion == $region -> idregion)
                        <option value="{{ $region -> idregion }}" selected>{{ $region -> nombreregion }} - {{ $pais -> nombrepais }}</option>
                    @elseif ($pais -> idpais == $region -> idpais)
                        <option value="{{ $region -> idregion }}" >{{ $region -> nombreregion }} - {{ $pais -> nombrepais }}</option>        
                    @endif                
                @endforeach          
            @endif
        @endforeach        
    </select>
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/subregion/') }}">REGRESAR</a> -->

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
                <h2 class="panel-title">{{ $mode == 'create' ? 'Crear SubRegión'  : 'Modificar SubRegión' }}</h2>
            </header>
            <section class="panel">
            <div class="panel-body p-5">
<div class="row">
    
            
            <div class="col-md-4 mb-3">
      <label for="validationCustom01">Nombre Sub Región</label>
      @if ($mode == 'create')
      <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="nombreSubRegion" id="nombreSubRegionCreate" value="{{ old('nombreSubRegionCreate') }}" required>    
        
            @else 
      <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="nombreSubRegion" id="nombreSubRegion" value="{{ isset($subRegion -> nombresubregion) ? $subRegion -> nombresubregion : old('nombreSubRegion') }}" required>    
           
     @endif
     </div>
     <div class="col-md-4 mb-3">
      <label for="validationCustom02">Region - País</label>
     @if ($mode == 'create')
    
     <select name="idRegion" id="idRegionCreate" data-plugin-selectTwo class="form-control populate" required>
        <option value="">Selecciona la región de origen</option>
        @foreach ($regiones as $region)
            @foreach ($paises as $pais)
                @if ($pais -> idpais == $region -> idpais)
                    <option value="{{ $region -> idregion }}">{{ $region -> nombreregion }} - {{ $pais -> nombrepais }}</option>
                @endif                
            @endforeach                        
        @endforeach
    </select>
@else
<select name="idRegion" id="idRegion" required data-plugin-selectTwo class="form-control populate" required> 
        <option value="">Selecciona el país de origen</option>
        @foreach ($regiones as $region)
            @if (isset($subRegion -> idregion))
                @foreach ($paises as $pais)
                    @if ($pais -> idpais == $region -> idpais && $subRegion -> idregion == $region -> idregion)
                        <option value="{{ $region -> idregion }}" selected>{{ $region -> nombreregion }} - {{ $pais -> nombrepais }}</option>
                    @elseif ($pais -> idpais == $region -> idpais)
                        <option value="{{ $region -> idregion }}" >{{ $region -> nombreregion }} - {{ $pais -> nombrepais }}</option>        
                    @endif                
                @endforeach          
            @endif
        @endforeach        
    </select>
@endif
    </div>
    

    </div>
    <div class="row ">
    <div class="col-md-4 mb-3">   <input type="submit" class="btn btn-success" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
                <a class="btn " href="{{ url('/subregion/') }}">REGRESAR</a></div>
    
  
    
    
    </div>
    </div>
        </section>   
    
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