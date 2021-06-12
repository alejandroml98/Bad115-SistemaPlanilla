

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
        <h2 class="panel-title">{{ $mode == 'create' ? 'Crear Dirección'  : 'Modificar Dirección' }}</h2>
    </header>
    <section class="panel">
        <div class="panel-body p-5">
            <div class="row">
            <h1> </h1>
                @if ($mode == 'create')           
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault01">País</label>
                        <select data-plugin-selectTwo class="form-control populate"  name="pais" id="pais" required>
                                <option value="" selected disabled>Seleccione un País</option>
                                @foreach ($paises as $pais)
                                <option value="{{ $pais -> idpais }}">{{ $pais -> nombrepais }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div  class="col-md-4 mb-3">
                        <label for="validationDefault01">Región</label>
                        <select data-plugin-selectTwo name="region" class="form-control populate"  id="region" required>
                            <option value="" selected disabled>Seleccione Primero un País</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Sub Región</label>
                        <select data-plugin-selectTwo class="form-control populate"  name="idSubRegion" id="idSubRegionCreate" required>
                            <option value="" selected disabled>Seleccione primero una Región</option>    
                        </select>
                    </div>
                @else
                    @php
                    $idRegionDireccion = 0;
                    $idPaisDireccion = 0;
                    @endphp

                    <div class="col-md-4 mb-3">
                        <label for="validationDefault01">País</label>
                        <select data-plugin-selectTwo class="form-control populate"  name="pais" id="pais" required>
                            @foreach ($subRegiones as $subRegion)
                                    @if ($subRegion -> idsubregion == $direccion -> idsubregion)                
                                        @php
                                            $idRegionDireccion = $subRegion -> idregion;
                                        @endphp                            
                                    @endif          
                                @endforeach        
                                @foreach ($regiones as $region)             
                                    @if ($region -> idregion == $idRegionDireccion)                
                                        @php
                                            $idPaisDireccion = $region -> idpais;
                                        @endphp                            
                                    @endif   
                                @endforeach
                                @foreach ($paises as $pais)
                                    @if ($pais -> idpais == $idPaisDireccion)
                                        <option value="{{ $pais -> idpais }}" selected>{{ $pais -> nombrepais }}</option>
                                    @else
                                        <option value="{{ $pais -> idpais }}">{{ $pais -> nombrepais }}</option>
                                    @endif
                            @endforeach
                        </select>
                    </div>
                    <div  class="col-md-4 mb-3">
                        <label for="validationDefault01">Región</label>
                        <select data-plugin-selectTwo class="form-control populate" name="region" id="region" required>
                            @foreach ($regiones as $region)             
                                @if ($region -> idregion == $idRegionDireccion)
                                    <option value="{{ $region -> idregion }}" selected>{{ $region -> nombreregion }}</option>
                                @elseif ($region -> idpais == $idPaisDireccion)
                                    <option value="{{ $region -> idregion }}">{{ $region -> nombreregion }}</option>
                                @endif   
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Sub Región</label>
                        <select data-plugin-selectTwo name="idSubRegion" id="idSubRegionCreate" class="form-control populate" required>
                            @foreach ($subRegiones as $subRegion)
                                @if ($subRegion -> idsubregion == $direccion -> idsubregion)
                                    <option value="{{ $subRegion -> idsubregion }}" selected>{{ $subRegion -> nombresubregion }}</option>                                          
                                @elseif ($subRegion -> idregion == $idRegionDireccion)
                                    <option value="{{ $subRegion -> idsubregion }}">{{ $subRegion -> nombresubregion }}</option>                                        
                                @endif          
                            @endforeach      
                        </select>
                    </div>

                @endif
                <div  class="col-md-12 mb-3"> 	
                <input type="text" name="anterior"  value="{{ url()->previous()}}" hidden>	 
                    @if ($mode == 'create')
                        <label for="validationDefault01" class="control-label">Detalle</label>
                        <input type="text" name="detalleDireccion" id="detalleDireccionCreate" value="{{ old('detalleDireccionCreate') }}" placeholder="Detalle de direccion" title="" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Ingrese detalles como calle, barrio, casa, etc" id="inputTooltip">
                    @else
                        <label class="control-label" >Detalle </label>
                        <input type="text"  name="detalleDireccion" id="detalleDireccion" value="{{ isset($direccion -> detalledireccion) ? $direccion -> detalledireccion : old('detalleDireccion') }}" placeholder="Detalle de direccion" title="" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Ingrese detalles como calle, barrio, casa, etc" id="inputTooltip">
                    @endif
                </div>
                <div class="col-md-12 mb-3 mt-5">
                    <input class="btn btn-primary" type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
                    <a class="btn btn-danger" href="{{url()->previous()}}"> Cancelar </a>
                </div>      
    </section>
</div>
@push('vendorjs')
<script>
    $(function() {
        $('select[name=pais]').change(function() {
            var url = "{{ url('pais') }}" + '/' +$(this).val() + '/region/';
            $.get(url, function(data) {
                var select = $('form select[name=region]');
                select.empty();                
                select.append('<option value="" selected disabled>Seleccione una Región</option>');
                $.each(data,function(key, value) {
                    select.append('<option value=' + value.idregion + '>' + value.nombreregion + '</option>');
                });           
                var selectSubRegion = $('form select[name=idSubRegion]');
                selectSubRegion.empty();
                selectSubRegion.append('<option value="" disabled selected>Seleccione primero una Región</option>');
            });
        });
    });
    $(function() {
        $('select[name=region]').change(function() {
            var url = "{{ url('region') }}" + '/' +$(this).val() + '/subregion/';
            $.get(url, function(data) {
                var select = $('form select[name=idSubRegion]');
                select.empty();
                select.append('<option value="" disabled selected>Seleccione una sub región</option>');
                $.each(data,function(key, value) {
                    select.append('<option value=' + value.idsubregion + '>' + value.nombresubregion + '</option>');
                });
            });
        });
    });
</script>
@endpush 