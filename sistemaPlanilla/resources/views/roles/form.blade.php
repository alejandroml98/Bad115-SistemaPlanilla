@extends('layouts.app')
@push('vendorcss')

<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />
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
                <h2 class="panel-title">{{ $mode == 'create' ? 'Crear Rol'  : 'Modificar Rol' }}</h2>
            </header>
            <section class="panel">
            <div class="panel-body p-5">
<div class="row">
    
            
    <div class="col-md-4 mb-3">
<label for="validationCustom01">Nombre Rol</label>
@if ($mode == 'create')
<input type="text" class="form-control" id="validationCustom01" placeholder="Administrador" name="name" id="nombreSubRegionCreate" value="" required>    

    @else 
<input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="name" id="" value="{{ isset($rol -> name) ? $rol -> name : old('name') }}" required>    
   
@endif
</div>
</div>
<div class="row">
<div class="col-12">
<table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                <th>ID</th>
            <th>Dirección</th>
            
            <th>Agregar Permiso de acceso</th>
                </tr>
            </thead>
            <tbody>
           
                    
              
              
        @foreach ($permisos as $permiso)
                <?php
                $cont = 0;
                ?>
                <tr class="gradeX">
                <td>{{ $loop -> iteration }}</td>
                <td class="text-center">{{$permiso->name}}</td>
                
              
                <td class="text-center">
                <div class="form-check p-0">
                       
                <!--endforeach-->
            @if ($mode == 'create')
                
                <label for="esAdministrativo" class="form-check-label pr-3">Seleccionar</label>
                <input type="checkbox" name="rutas[]" id="esAdministrativoCreate"  value="{{$permiso->name}}" class="form-check-input">
               
          
            @else
                <div class="form-check p-0">
                <label for="esAdministrativo" class="form-check-label pr-3">Seleccionar</label>
         
            @foreach($permissions as $permisosrol)
                @if($permisosrol->name == $permiso->name)
                    <?php
                    $cont = $cont+1;
                    ?>
                @endif
            @endforeach
            @if($cont == 1)
            <input type="checkbox" name="rutas[]" id="esAdministrativoCreate"  checked value="{{$permiso->name}}" class="form-check-input">
            @else
            <input type="checkbox" name="rutas[]" id="esAdministrativoCreate"  value="{{$permiso->name}}" class="form-check-input">
            @endif
           
        </div>
                </td>
      
        
       
        @endif
                    
                 

                
        @endforeach
            </tbody>
        </table> 
</div>
<div class="row ml-1 pt-4">
            <div class="form-group">
                <input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}" class="btn btn-primary">
                <a class="btn btn-danger" href="{{url()->previous()}}">Cancelar</a>
            </div>
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