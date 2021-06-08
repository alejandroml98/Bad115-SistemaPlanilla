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
<div class="row">
    <div class="col-xs-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">{{ $mode == 'create' ? 'Crear Empresa'  : 'Modificar Empresa' }}</h2>
            </header>
            <div class="panel-body p-5">
                @if ($mode == 'create')
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="codigoEmpresa">{{ 'Código Empresa' }}</label>
                        <input type="text" name="codigoEmpresa" id="codigoEmpresaCrear" value="{{ old('codigoEmpresaCrear') }}" class="form-control" placeholder="Codigo">
                        <small id="codigoEmpresa" class="form-text text-muted">El código consta de 2 letras y 5 números.</small>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="nombreEmpresa">{{ 'Nombre Empresa' }}</label>
                        <input type="text" name="nombreEmpresa" id="nombreEmpresaCrear" value="{{ old('nombreEmpresaCrear') }}" class="form-control" placeholder="Nombre de la Empresa">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nit">{{ 'NIT' }}</label>
                        <input type="text" name="nit" id="nitCrear" value="{{ old('nitCrear') }}" class="form-control" placeholder="############">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nic">{{ 'NIC' }}</label>
                        <input type="text" name="nic" id="nicCrear" value="{{ old('nicCrear') }}" class="form-control" placeholder="############">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="telefonoEmpresa">{{ 'Teléfono Empresa' }}</label>
                        <input type="text" name="telefonoEmpresa" id="telefonoEmpresaCrear" value="{{ old('telefonoEmpresaCrear') }}" class="form-control" placeholder="####-####">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="paginaWeb">{{ 'Página Web Empresa' }}</label>
                        <input type="text" name="paginaWeb" id="paginaWebCrear" value="{{ old('paginaWebCrear') }}" class="form-control" placeholder="https//:www.empresax.com">
                    </div>
                </div>
                <div class="form-group">
                    <label for="correoElectronicoEmpresa">{{ 'Correo Empresa' }}</label>
                    <input type="email" name="correoElectronicoEmpresa" id="correoElectronicoEmpresaCrear" value="{{ old('correoElectronicoEmpresaCrear') }}" class="form-control" placeholder="contacto@empresa.com">
                </div>
                <div class="form-group">
                    <label for="idDireccion">{{ 'Dirección Empresa' }}</label>
                    <select data-plugin-selectTwo name="idDireccion" id="idDireccionCreate" class="form-control">
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
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="salarioMinimo">{{ 'Salario Mínimo' }}</label>
                        <input type="number" min="0" max="99999" step=".01" name="salarioMinimo" id="salarioMinimoCreate" value="{{ old('salarioMinimoCreate') }}" class="form-control">
                    </div>
                    <div class="form-group col-md-4 align-items-center">
                        <div class="form-check">
                            <label class="form-check-label pl-5" for="periodoPago">
                                {{ '¿Paga Mensualmente?' }}
                            </label>
                            <input class="form-check-input" type="checkbox" type="checkbox" name="periodoPago" id="periodoPagoCreate" value="1">
                        </div>
                    </div>
                </div>


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