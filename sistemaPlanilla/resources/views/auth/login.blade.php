@extends('layouts.app')

@section('content')
<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left hidden-xs">
            <img src="assets/images/logo.png" height="54" alt="Across logo" /> <span class="company-name">ACROSS</span>
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-md text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> {{ __('Iniciar Sesión') }}</h2>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-lg">
                        <label>{{ __('Correo Electrónico') }}</label>
                        <div class="input-group input-group-icon">
                            <input id="email" type="email" class="form-control input-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-user"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-lg">
                        <div class="clearfix">
                            <label class="pull-left">{{ __('Contraseña') }}</label>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="pull-right">{{ __('¿Olvidó su contraseña?') }}</a>
                            @endif
                        </div>
                        <div class="input-group input-group-icon">
                            <input id="password" type="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">
                                <input name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox" />
                                <label for="RememberMe">{{ __('Recordarme') }}</label>
                            </div>
                        </div>                        
                    </div>
                    <div class="form-group py-5">
                            <button type="submit" class="btn hidden-xs btn-block" style="background-color: #34495E; color: white;">{{ __('Iniciar Sesión') }}</button>
                            <button type="submit" class="btn btn-block btn-lg visible-xs mt-lg" style="background-color: #34495E; color: white;">{{ __('Iniciar Sesión') }}</button>
                        </div>
                    <span class="mb-lg line-thru text-center text-uppercase">
                        <span>o</span>
                    </span>
                    @if (Route::has('password.request'))
                    <p class="text-center">¿No tienes una cuenta? <a href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                    @endif

                </form>
            </div>
        </div>
    </div>
</section>
@endsection