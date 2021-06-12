



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
                <h2 class="panel-title">{{ $mode == 'create' ? 'Crear Región'  : 'Modificar Región' }}</h2>
            </header>
            <section class="panel">
            <div class="panel-body p-5">
<div class="row">
    
            
            <div class="col-md-4 mb-3">
      <label for="validationCustom01">Nombre Región</label>
      @if ($mode == 'create')
      <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="nombreRegion" id="nombreRegionCreate" value="{{ old('nombreRegionCreate') }}" required>    
        
            @else 
      <input type="text" class="form-control" id="validationCustom01" placeholder="First name"name="nombreRegion" id="nombreRegion" value="{{ isset($region -> nombreregion) ? $region -> nombreregion : old('nombreRegion') }}" required>    
           
     @endif
     </div>
     <div class="col-md-4 mb-3">
      <label for="validationCustom02">País</label>
     @if ($mode == 'create')
    
    <select name="idPais" data-plugin-selectTwo class="form-control populate" id="idPaisCreate" required>
        <option value="">Selecciona el país de origen</option>
        @foreach ($paises as $pais)            
            <option value="{{ $pais -> idpais }}">{{ $pais -> nombrepais }}</option>                
        @endforeach
    </select>
@else
    <select name="idPais" id="idPais" data-plugin-selectTwo class="form-control populate" required>
        <option value="">Selecciona el país de origen</option>
        @foreach ($paises as $pais)
            @if (isset($region -> idpais))
                @if ($region -> idpais == $pais -> idpais)
                    <option value="{{ $pais -> idpais }}" selected>{{ $pais -> nombrepais }}</option>                    
                @else
                    <option value="{{ $pais -> idpais }}">{{ $pais -> nombrepais }}</option>                                
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
