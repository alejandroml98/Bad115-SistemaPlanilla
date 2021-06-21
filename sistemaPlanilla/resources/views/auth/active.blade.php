@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tu cuenta se encuentra desactivada') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!Auth::user()->en_proceso)
                    <p>Si quieres volverla activar presiona el siguiente boton:</p>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{url('usuario/proceso')}}" class="btn btn-primary">
                                {{ __('Enviar solicitud de reactivación de cuenta') }}
                            </a>                    
                        </div>
                    </div>
                    @else
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <h2>Tu proceso de activación se encuentra activo</h2>                  
                        </div>
                    </div>
                    @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
