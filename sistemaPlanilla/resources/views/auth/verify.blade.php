@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un link de verificación ha sido enviado a tu correo electrónico') }}
                            <!--{{ __('A fresh verification link has been sent to your email address.') }}-->
                        </div>
                    @endif
                    {{ __('Antes de seguir, revisa tu correo electronico por el link de verificación.') }}
                    {{ __('Si no recibiste el correo electrpónico') }},
                    <!--{{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},-->
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Reenviar correo electrónico') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
