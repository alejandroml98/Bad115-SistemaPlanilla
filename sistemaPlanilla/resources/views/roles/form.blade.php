@extends('layouts.app')
@push('vendorcss')
<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/pnotify/pnotify.custom.css')}}" />
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
                <td class="text-center">
          
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
<script src="{{ asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
<script src="{{ asset('assets/vendor/select2/select2.js')}}"></script>
 <script src="{{ asset('assets/vendor/select2/select2_locale_es.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
 <script src="{{ asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
<script src="{{ asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
<script src="{{ asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>
<script src="{{ asset('assets/vendor/pnotify/pnotify.custom.js')}}"></script>

<script src="js/profesion.js"></script>
@if (Session::has('mensaje'))
<script type="text/javascript">
    mostrarMensaje('{{ Session::get("mensaje") }}');
</script>
@endif
@if (count($errors) > 0 && Session::get('peticion') == 'crear')
<script>
    document.getElementById('btnCrear').click();
</script>
@elseif (count($errors) > 0 && Session::get('peticion') != 'crear')
<script>
    document.getElementById("{{Session::get('peticion')}}").click();
</script>
@endif
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#datatable-default').DataTable();
        var id = 1;
        table.on('click', '.editar', function() {
            $tr = $(this).closest('tr');
            id = $(this).data("id");
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('parent');
            }
            var data = table.row($tr).data();
            $('#nombrePais').val(data[1]);
            $('#valMax').val(data[2]);
           

            $('#editar-form').attr('action', '/pais/' + id);
            if (('editar'.$id) == "{{Session::get('peticion')}}") {
                document.getElementById("{{'error'.Session::get('peticion')}}").style.display = 'block';
            } else {
                document.getElementById("{{'error'.Session::get('peticion')}}").style.display = 'none';
            }
        });
    });
</script>

@endpush