@extends('layouts.app')

@section('content')
<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left">
            <img src="assets/images/logo.png" height="54" alt="Across Logo" />
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>{{ __('Registrarse') }}</h2>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group mb-lg">
                        <label>{{ __('Nombre') }}</label>
                        <input id="name" name="name" type="text" class="form-control input-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-lg">
                        <label>{{ __('Correo Electrónico') }}</label>
                        <input id="email" name="email" type="email" class="form-control input-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-none">
                        <div class="row">
                            <div class="col-sm-6 mb-lg">
                                <label>{{ __('Contraseña') }}</label>
                                <input id="password" type="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-lg">
                                <label>{{ __('Confirmar Contraseña') }}</label>
                                <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" required autocomplete="new-password"/>                              
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-block hidden-xs" style="background-color: #34495E; color: white;">{{ __('Registrarse') }}</button>
                            <button type="submit" class="btn btn-block btn-block btn-lg visible-xs mt-lg" style="background-color: #34495E; color: white;">{{ __('Registrarse') }}</button>
                        </div>
                    </div>

                    <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                        <span>o</span>
                    </span>

                    <p class="text-center">¿Ya tienes una cuenta? <a href="pages-signin.html">Iniciar Sesión</a>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection