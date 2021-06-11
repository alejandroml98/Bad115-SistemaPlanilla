<div class="row">
    <div class="col-xs-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">{{ $mode == 'create' ? 'Crear Empresa'  : 'Modificar Empresa' }}</h2>
            </header>
            <div class="panel-body p-5">
                @if ($mode == 'create')
                    <div class="form-row p-3">
                        <div class="form-group col-md-4">
                            <label for="codigoEmpresa">{{ 'Código Empresa' }}</label>
                            <input type="text" name="codigoEmpresa" id="codigoEmpresaCrear" value="{{ old('codigoEmpresa') }}" class="form-control" placeholder="Codigo">
                            <small id="codigoEmpresaInstruc" class="form-text text-muted">El código consta de 2 letras y 5 números.</small>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nombreEmpresa">{{ 'Nombre Empresa' }}</label>
                            <input type="text" name="nombreEmpresa" id="nombreEmpresaCrear" value="{{ old('nombreEmpresa') }}" class="form-control" placeholder="Nombre de la Empresa">
                        </div>
                    </div>
                    <div class="form-row pb-3">
                        <div class="form-group col-md-4">
                            <label for="nit">{{ 'NIT' }}</label>
                            <input type="text" name="nit" id="nitCrear" value="{{ old('nit') }}" class="form-control" placeholder="############">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nic">{{ 'NIC' }}</label>
                            <input type="text" name="nic" id="nicCrear" value="{{ old('nic') }}" class="form-control" placeholder="############">
                        </div>
                    </div>
                    <div class="form-row pb-3">
                        <div class="form-group col-md-4">
                            <label for="telefonoEmpresa">{{ 'Teléfono Empresa' }}</label>
                            <input type="text" name="telefonoEmpresa" id="telefonoEmpresaCrear" value="{{ old('telefonoEmpresa') }}" class="form-control" placeholder="####-####">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="paginaWeb">{{ 'Página Web Empresa' }}</label>
                            <input type="text" name="paginaWeb" id="paginaWebCrear" value="{{ old('paginaWeb') }}" class="form-control" placeholder="https//:www.empresax.com">
                        </div>
                    </div>
                    <div class="form-group pb-3">
                        <label for="correoElectronicoEmpresa">{{ 'Correo Empresa' }}</label>
                        <input type="email" name="correoElectronicoEmpresa" id="correoElectronicoEmpresaCrear" value="{{ old('correoElectronicoEmpresa') }}" class="form-control" placeholder="contacto@empresa.com">
                    </div>
                    <div class="form-row pb-3">
                        <div class="form-group col-md-8">
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
                        <div class="form-group col-md-4 align-self-center pt-3">
                            <a href="{{ url('/direccion/create') }}" class="btn btn-success">
                                Agregar Direccion <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="form-row pb-3">
                        <div class="form-group col-md-6">
                            <label for="salarioMinimo">{{ 'Salario Mínimo' }}</label>
                            <input type="number" min="0" max="99999" step=".01" name="salarioMinimo" id="salarioMinimoCreate" value="{{ old('salarioMinimo') }}" class="form-control">
                        </div>
                        <div class="form-group col-md-4 align-self-center pt-3 modal-with-form">
                            <div class="form-check">
                                <label class="form-check-label pl-5 pr-3" for="periodoPago">
                                    {{ '¿Paga Mensualmente?' }}
                                </label>
                                <input type='hidden' value='0' name='periodoPago' value='0'>
                                <input class="form-check-input" type="checkbox" name="periodoPago" id="periodoPagoCreate" value="1">
                            </div>
                        </div>
                    </div>
                @else
                    <input hidden type="text" name="codigoEmpresaAnterior" id="codigoEmpresaAnterior" value="{{ isset($empresa -> codigoempresa)? $empresa -> codigoempresa : old('codigoEmpresaAnterior') }}">
                    <div class="form-row pb-3">
                        <div class="form-group col-md-4">
                            <label for="codigoEmpresa">{{ 'Código Empresa' }}</label>
                            <input type="text" name="codigoEmpresa" id="codigoEmpresa" value="{{ isset($empresa -> codigoempresa)? $empresa -> codigoempresa : old('codigoEmpresa') }}" class="form-control" placeholder="Codigo">
                            <small id="codigoEmpresaInstrc" class="form-text text-muted">El código consta de 2 letras y 5 números.</small>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nombreEmpresa">{{ 'Nombre Empresa' }}</label>
                            <input type="text" name="nombreEmpresa" id="nombreEmpresaCrear" value="{{ isset($empresa -> nombreempresa)? $empresa -> nombreempresa : old('nombreEmpresa') }}" class="form-control" placeholder="Nombre de la Empresa">
                        </div>
                    </div>
                    <div class="form-row pb-3">
                        <div class="form-group col-md-4">
                            <label for="nit">{{ 'NIT' }}</label>
                            <input type="text" name="nit" id="nit" value="{{ isset($empresa -> nit)? $empresa -> nit : old('nit') }}" class="form-control" placeholder="############">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nic">{{ 'NIC' }}</label>
                            <input type="text" name="nic" id="nic" value="{{ isset($empresa -> nic)? $empresa -> nic : old('nic') }}" class="form-control" placeholder="############">
                        </div>
                    </div>
                    <div class="form-row pb-3">
                        <div class="form-group col-md-4">
                            <label for="telefonoEmpresa">{{ 'Teléfono Empresa' }}</label>
                            <input type="text" name="telefonoEmpresa" id="telefonoEmpresa" value="{{ isset($empresa -> telefonoempresa)? $empresa -> telefonoempresa : old('telefonoEmpresa') }}" class="form-control" placeholder="####-####">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="paginaWeb">{{ 'Página Web Empresa' }}</label>
                            <input type="text" name="paginaWeb" id="paginaWeb" value="{{ isset($empresa -> paginaweb)? $empresa -> paginaweb : old('paginaWeb') }}" class="form-control" placeholder="https//:www.empresax.com">
                        </div>
                    </div>
                    <div class="form-group pb-3">
                        <label for="correoElectronicoEmpresa">{{ 'Correo Empresa' }}</label>
                        <input type="text" name="correoElectronicoEmpresa" id="correoElectronicoEmpresa" value="{{ isset($empresa -> correoelectronicoempresa)? $empresa -> correoelectronicoempresa : old('correoElectronicoEmpresa') }}" class="form-control" placeholder="contacto@empresa.com">
                    </div>
                    <div class="form-row pb-3">
                        <div class="form-group col-md-8">
                            <label for="idDireccion">{{ 'Dirección Empresa' }}</label>
                            <select data-plugin-selectTwo name="idDireccion" id="idDireccionCreate" class="form-control">
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
                        </div>
                        <div class="form-group col-md-4 align-self-center pt-3 ">
                            <a href="{{ url('/direccion/'.$direccion -> iddireccion.'/edit') }}" class="btn btn-primary">
                                Editar Direccion <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                        </div>                    
                    </div>
                    <div class="form-row pb-3">
                        <div class="form-group col-md-6">
                            <label for="salarioMinimo">{{ 'Salario Mínimo' }}</label>
                            <input type="number" min="0" max="99999" step=".01" name="salarioMinimo" id="salarioMinimo" value="{{ isset($empresa -> salariominimo)? $empresa -> salariominimo : old('salarioMinimoCreate') }}" class="form-control">
                        </div>
                        <div class="form-group col-md-4 align-self-center pt-3">
                            <div class="form-check">
                                <label class="form-check-label pl-5" for="periodoPago">
                                    {{ '¿Paga Mensualmente?' }}
                                </label>
                                @if ($empresa -> periodopago)
                                <input type='hidden' value='0' name='periodoPago'>
                                <input class="form-check-input" type="checkbox" checked name="periodoPago" id="periodoPago" value="1">
                                @else
                                <input type='hidden' value='1' name='periodoPago'>
                                <input class="form-check-input" type="checkbox" name="periodoPago" id="periodoPago" value="0">
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger mt-2" role="alert" id="{{'error'.Session::get('peticion')}}">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
                    <a class="btn btn-danger" href="{{ url('/empresa/') }}">Cancelar</a>
                </div>
            </div>
        </section>
    </div>
</div>
@push('vendorjs')
<script type="text/javascript">
    function toggleDiv(id) {
        var div = document.getElementById(id);
        div.style.display = div.style.display == "none" ? "block" : "none";
    }
</script>
@endpush