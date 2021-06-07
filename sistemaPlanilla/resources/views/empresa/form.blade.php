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
<h2>{{ $mode == 'create' ? 'Crear Empresa'  : 'Modificar Empresa' }}</h2>
@if ($mode == 'create')
    <label for="codigoEmpresa">{{ 'Código Empresa' }}</label>
    <input type="text" name="codigoEmpresa" id="codigoEmpresaCrear" value="{{ old('codigoEmpresaCrear') }}">
    <label for="nombreEmpresa">{{ 'Nombre Empresa' }}</label>
    <input type="text" name="nombreEmpresa" id="nombreEmpresaCrear" value="{{ old('nombreEmpresaCrear') }}">
    <label for="nit">{{ 'NIT' }}</label>
    <input type="text" name="nit" id="nitCrear" value="{{ old('nitCrear') }}">
    <label for="nic">{{ 'NIC' }}</label>
    <input type="text" name="nic" id="nicCrear" value="{{ old('nicCrear') }}">
    <label for="telefonoEmpresa">{{ 'Teléfono Empresa' }}</label>
    <input type="text" name="telefonoEmpresa" id="telefonoEmpresaCrear" value="{{ old('telefonoEmpresaCrear') }}">
    <label for="paginaWeb">{{ 'Página Web Empresa' }}</label>
    <input type="text" name="paginaWeb" id="paginaWebCrear" value="{{ old('paginaWebCrear') }}">
    <label for="correoElectronicoEmpresa">{{ 'Correo Empresa' }}</label>
    <input type="text" name="correoElectronicoEmpresa" id="correoElectronicoEmpresaCrear" value="{{ old('correoElectronicoEmpresaCrear') }}">
    <label for="idDireccion">{{ 'Dirección Empresa' }}</label>
    <select name="idDireccion" id="idDireccionCreate">
        @foreach ($direcciones as $direccion)
            @foreach ($subRegiones as $subRegion)
                @if ($subRegion -> idsubregion == $direccion -> idsubregion)
                    @foreach ($regiones as $region)
                        @if ($region -> idregion == $subRegion -> idregion)
                            @foreach ($paises as $pais)
                                @if ($pais -> idpais == $region -> idpais)
                                    <option value="{{ $direccion -> iddireccion }}">{{ $pais -> nombrepais }}, {{ $region -> nombreregion }}, {{ $subRegion -> nombresubregion }}, {{ $direccion -> detalledireccion }}</option>                              
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endforeach        
    </select>
    <label for="periodoPago">{{ '¿Paga Mensualmente?' }}</label>    
    <input type="checkbox" name="periodoPago" id="periodoPagoCreate" value="1">
    <label for="salarioMinimo">{{ 'Salario Mínimo' }}</label>    
    <input type="number" min="0" max="99999" step=".01" name="salarioMinimo" id="salarioMinimoCreate" value="{{ old('salarioMinimoCreate') }}">
@else
    <input hidden type="text" name="codigoEmpresaAnterior" id="codigoEmpresaAnterior" value="{{ isset($empresa -> codigoempresa)? $empresa -> codigoempresa : old('codigoEmpresaAnterior') }}">
    <label for="codigoEmpresa">{{ 'Código Empresa' }}</label>
    <input type="text" name="codigoEmpresa" id="codigoEmpresa" value="{{ isset($empresa -> codigoempresa)? $empresa -> codigoempresa : old('codigoEmpresa') }}">
    <label for="nombreEmpresa">{{ 'Nombre Empresa' }}</label>
    <input type="text" name="nombreEmpresa" id="nombreEmpresaCrear" value="{{ isset($empresa -> nombreempresa)? $empresa -> nombreempresa : old('nombreEmpresa') }}">
    <label for="nit">{{ 'NIT' }}</label>
    <input type="text" name="nit" id="nit" value="{{ isset($empresa -> nit)? $empresa -> nit : old('nit') }}">
    <label for="nic">{{ 'NIC' }}</label>
    <input type="text" name="nic" id="nic" value="{{ isset($empresa -> nic)? $empresa -> nic : old('nic') }}">
    <label for="telefonoEmpresa">{{ 'Teléfono Empresa' }}</label>
    <input type="text" name="telefonoEmpresa" id="telefonoEmpresa" value="{{ isset($empresa -> telefonoempresa)? $empresa -> telefonoempresa : old('telefonoEmpresa') }}">
    <label for="paginaWeb">{{ 'Página Web Empresa' }}</label>
    <input type="text" name="paginaWeb" id="paginaWeb" value="{{ isset($empresa -> paginaweb)? $empresa -> paginaweb : old('paginaWeb') }}">
    <label for="correoElectronicoEmpresa">{{ 'Correo Empresa' }}</label>
    <input type="text" name="correoElectronicoEmpresa" id="correoElectronicoEmpresa" value="{{ isset($empresa -> correoelectronicoempresa)? $empresa -> correoelectronicoempresa : old('correoElectronicoEmpresa') }}">
    <label for="idDireccion">{{ 'Dirección Empresa' }}</label>
    <select name="idDireccion" id="idDireccionCreate">
        @foreach ($direcciones as $direccion)
            @foreach ($subRegiones as $subRegion)
                @if ($subRegion -> idsubregion == $direccion -> idsubregion)
                    @foreach ($regiones as $region)
                        @if ($region -> idregion == $subRegion -> idregion)
                            @foreach ($paises as $pais)
                                @if ($pais -> idpais == $region -> idpais)
                                    @if ($empresa -> iddireccion == $direccion -> iddireccion)
                                        <option selected value="{{ $direccion -> iddireccion }}">{{ $pais -> nombrepais }}, {{ $region -> nombreregion }}, {{ $subRegion -> nombresubregion }}, {{ $direccion -> detalledireccion }}</option>
                                    @else
                                        <option value="{{ $direccion -> iddireccion }}">{{ $pais -> nombrepais }}, {{ $region -> nombreregion }}, {{ $subRegion -> nombresubregion }}, {{ $direccion -> detalledireccion }}</option>
                                    @endif                                    
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endforeach        
    </select>
    <label for="periodoPago">{{ '¿Paga Mensualmente?' }}</label>
    @if ($empresa -> periodopago)
        <input type="checkbox" checked name="periodoPago" id="periodoPago" value="1">
    @else
        <input type="checkbox" name="periodoPago" id="periodoPago" value="1">
    @endif    
    <label for="salarioMinimo">{{ 'Salario Mínimo' }}</label>    
    <input type="number" min="0" max="99999" step=".01" name="salarioMinimo" id="salarioMinimo" value="{{ isset($empresa -> salariominimo)? $empresa -> salariominimo : old('salarioMinimoCreate') }}">
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/empresa/') }}">REGRESAR</a>