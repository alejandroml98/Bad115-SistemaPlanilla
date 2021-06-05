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
<h2>{{ $mode == 'create' ? 'Agregar Direccion'  : 'Modificar Direccion' }}</h2>

@if ($mode == 'create')
    <select name="pais" id="pais" required>
        <option value="" selected disabled>Seleccione un País</option>
        @foreach ($paises as $pais)
            <option value="{{ $pais -> idpais }}">{{ $pais -> nombrepais }}</option>
        @endforeach
    </select>

    <select name="region" id="region" required>
        <option value="" selected disabled>Seleccione Primero un País</option>
    </select>

    <select name="idSubRegion" id="idSubRegionCreate" required>
        <option value="" selected disabled>Seleccione primero una Región</option>    
    </select>
@else
    @php
        $idRegionDireccion = 0;
        $idPaisDireccion = 0;
    @endphp
    <select name="pais" id="pais" required>        
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
    <select name="region" id="region" required>            
        @foreach ($regiones as $region)             
            @if ($region -> idregion == $idRegionDireccion)
                <option value="{{ $region -> idregion }}" selected>{{ $region -> nombreregion }}</option>
            @elseif ($region -> idpais == $idPaisDireccion)
                <option value="{{ $region -> idregion }}">{{ $region -> nombreregion }}</option>
            @endif   
        @endforeach
    </select>    
    <select name="idSubRegion" id="idSubRegion" required>       
        @foreach ($subRegiones as $subRegion)
            @if ($subRegion -> idsubregion == $direccion -> idsubregion)
                <option value="{{ $subRegion -> idsubregion }}" selected>{{ $subRegion -> nombresubregion }}</option>                                          
            @elseif ($subRegion -> idregion == $idRegionDireccion)
                <option value="{{ $subRegion -> idsubregion }}">{{ $subRegion -> nombresubregion }}</option>                                        
            @endif          
        @endforeach             
    </select>     
@endif

<label for="detalleDireccion">{{ 'Detalle Dirección' }}</label>
@if ($mode == 'create')
    <input type="text" name="detalleDireccion" id="detalleDireccionCreate" value="{{ old('detalleDireccionCreate') }}">
@else
    <input type="text" name="detalleDireccion" id="detalleDireccion" value="{{ isset($direccion -> detalledireccion) ? $direccion -> detalledireccion : old('detalleDireccion') }}">
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/direccion/') }}">REGRESAR</a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function() {
        $('select[name=pais]').change(function() {
            var url = '{{ url('pais') }}' + '/' +$(this).val() + '/region/';
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
            var url = '{{ url('region') }}' + '/' +$(this).val() + '/subregion/';
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