@extends('layouts.app')
@push('vendorcss')
<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}" />
@endpush

@section('content')
<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left">
            <img src="assets/images/logo.png" height="54" alt="Across Logo" /> <span class="company-name">ACROSS</span>
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>{{ __('Modificar usuario') }}</h2>
            </div>
           < <div class="panel-body">
          <!--  <div class="col-sm-6 mb-3">
           <div class="card h-100">
            <form action="{{ url('/profile/update') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                   {{ method_field('PUT') }}
                   <input type="text" hidden name="id" id="id" value="{{ $user -> id }}">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">Cambiar Información</h6>
                      <div class="form-group">
                        <label for="name">{{'Nombre de usuario'}}</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user -> name }}" >
                       
                      </div>
                      <hr>
                      <div class="form-group">
                        <label for="email">{{"Email"}} </label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user -> email }}">
                        
                      </div>
                       <hr>
                      <input  class="btn btn-info" type="submit" value="Cambiar Informacion del Usuario">
                    </div>
              </form>
            </div>
   -->
            <form action="{{ url('/profile/update2') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                   {{ method_field('PUT') }}
                   <input type="text" hidden name="id" id="id" value="{{ $user -> id }}">
                    <div class="form-group mb-lg">
                        <label>{{ __('Nombre de usuario') }}</label>
                        <input id="name" name="name" type="text" class="form-control input-lg @error('name') is-invalid @enderror" value="{{ isset($user -> name) ? $user -> name : old('name') }}" required autocomplete="name" autofocus />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> 
                   
                    <div class="form-group mb-lg">
                        <label>{{ __('Correo Electrónico') }}</label>
                        <input id="email" name="email" type="email" class="form-control input-lg @error('email') is-invalid @enderror" value="{{ isset($user -> email) ? $user ->email : old('email') }}" required autocomplete="email" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-lg">
                        <label>Roles de usuario</label>
                        <div class="col-md-12">
                            <div class="btn-group">
                                <select name="roles[]" class="form-control" multiple="multiple" data-plugin-multiselect data-multiselect-toggle-all="true" id="ms_example7">
                                    @foreach ($roles as $rol)
                                    <?php
                                    $cont = 0;
                                    ?>   
                                    @foreach($rolesU as $rolU)
                                    @if ($rol->name == $rolU)
                                    <?php
                                    $cont = $cont +1;
                                    ?>   
                                    @else
                                      
                                    @endif  
                                    @endforeach  
                                    @if ($cont == 1)
                                    <option selected value="{{$rol->name}}">{{$rol->name}}</option>    
                                    @else
                                    <option value="{{$rol->name}}">{{$rol->name}}</option>    
                                    @endif                                  
                                    @endforeach                                    
                                </select>
                                <button id="ms_example7-toggle" class="btn btn-primary">Seleccionar todo</button>
                            </div>
                        </div>
                    </div>
                   

                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-block btn-block hidden-xs" style="background-color: #34495E; color: white;">{{ __('Modificar usuario') }}</button>
                            <button type="submit" class="btn btn-block btn-block btn-lg visible-xs mt-lg" style="background-color: #34495E; color: white;">{{ __('Modificar usuario') }}</button>
                        </div>
                    </div>

                   

                </form> -->
            </div>
        </div>
    </div>
</section>
@endsection
@push('vendorjs')
<script src="{{ asset('assets/vendor/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/javascripts/forms/examples.advanced.form.js') }}"></script>    
@endpush