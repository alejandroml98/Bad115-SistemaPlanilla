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
<h2>{{ $mode == 'create' ? 'Agregar Pais'  : 'Modificar Pais' }}</h2>
<label for="nombrePais">{{ 'Nombre país' }}</label>
@if ($mode == 'create')
    <input type="text" name="nombrePais" id="nombrePaisCreate" value="{{ old('nombrePaisCreate') }}">
@else
    <input type="text" name="nombrePais" id="nombrePais" value="{{ isset($pais -> nombrepais) ? $pais -> nombrepais : old('nombrePais') }}">
@endif
<label for="idTipoRegion">{{ 'Tipo Sub Region' }}</label>
@if ($mode == 'create')
    <select name="idTipoRegion" id="idTipoRegionCreate" required>
        <option value="">Selecciona un tipo de región</option>
        @foreach ($tiposRegion as $tipoRegion)            
            <option value="{{ $tipoRegion -> idtiporegion }}">{{ $tipoRegion -> nombretiporegion }} - {{ $tipoRegion -> nombretiposubregion }}</option>                
        @endforeach
    </select>
@else
    <select name="idTipoRegion" id="idTipoRegion" required>
        <option value="">Selecciona un tipo de región</option>
        @foreach ($tiposRegion as $tipoRegion)
            @if (isset($pais -> idtiporegion))
                @if ($pais -> idtiporegion == $tipoRegion -> idtiporegion)
                    <option value="{{ $tipoRegion -> idtiporegion }}" selected>{{ $tipoRegion -> nombretiporegion }} - {{ $tipoRegion -> nombretiposubregion }}</option>                    
                @else
                    <option value="{{ $tipoRegion -> idtiporegion }}">{{ $tipoRegion -> nombretiporegion }} - {{ $tipoRegion -> nombretiposubregion }}</option>                                
                @endif            
            @endif
        @endforeach
    </select>
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/pais/') }}">REGRESAR</a> -->
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
                <h2 class="panel-title">{{ $mode == 'create' ? 'Crear Pais'  : 'Modificar Pais' }}</h2>
            </header>
            <section class="panel">
            <div class="panel-body p-5">
<div class="row">
    
            
            <div class="col-md-4 mb-3">
      <label for="validationCustom01">Nombre</label>
      @if ($mode == 'create')
      <input type="text" class="form-control"  placeholder="First name" name="nombrePais" id="nombrePaisCreate" value="{{ old('nombrePaisCreate') }}" required>    
        
            @else 
      <input type="text" class="form-control"  placeholder="First name" name="nombrePais" id="nombrePais" value="{{ isset($pais -> nombrepais) ? $pais -> nombrepais : old('nombrePais') }}" required>    
           
     @endif
     </div>
     <div class="col-md-4 mb-3">
      <label for="validationCustom02">Seleccione un tipo de región</label>
     @if ($mode == 'create')
    
     <select name="idTipoRegion" id="idTipoRegionCreate" data-plugin-selectTwo class="form-control populate"  required>
        <option value="">Selecciona un tipo de región</option>
        @foreach ($tiposRegion as $tipoRegion)            
            <option value="{{ $tipoRegion -> idtiporegion }}">{{ $tipoRegion -> nombretiporegion }} - {{ $tipoRegion -> nombretiposubregion }}</option>                
        @endforeach
    </select>
@else
<select name="idTipoRegion" id="idTipoRegion" data-plugin-selectTwo class="form-control populate"  required>
        <option value="">Selecciona un tipo de región</option>
        @foreach ($tiposRegion as $tipoRegion)
            @if (isset($pais -> idtiporegion))
                @if ($pais -> idtiporegion == $tipoRegion -> idtiporegion)
                    <option value="{{ $tipoRegion -> idtiporegion }}" selected>{{ $tipoRegion -> nombretiporegion }} - {{ $tipoRegion -> nombretiposubregion }}</option>                    
                @else
                    <option value="{{ $tipoRegion -> idtiporegion }}">{{ $tipoRegion -> nombretiporegion }} - {{ $tipoRegion -> nombretiposubregion }}</option>                                
                @endif            
            @endif
        @endforeach
    </select>
@endif
    </div>
    

    </div>
    <div class="row ml-1 pt-4">
            <div class="form-group">
                <input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}" class="btn btn-primary">
                <a class="btn btn-danger" href="{{url()->previous()}}">Cancelar</a>
            </div>
        </div>
  
    
    
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