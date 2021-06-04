<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //                        
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verificar correo electrónico')
                ->line('Por favor confirma tu correo electrónico.')
                ->line('Para ello simplemente debes hacer click en el siguiente enlace:')
                ->action('Clic para confirmar su correo electrónico', $url);
        });

        ResetPassword::toMailUsing(function($notifiable, $token){
            return (new MailMessage)
                ->subject(Lang::get('Reestablecer contraseña'))
                ->line(Lang::get('Estas recibiendo este correo porque hemos recibido un petición de restablecimiento de contraseña para tu cuenta.'))                
                ->action(Lang::get('Restablecer contraseña'), url(config('app.url').':8000'.route('password.reset', ['token' => $token, 'email' => $notifiable->getEmailForPasswordReset()], false)))
                ->line(Lang::get('Este link expirara en :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))                
                ->line(Lang::get('Si no hiciste la petición de restablecimiento de contraseña ignora este correo.'));
        });
    }
}
