<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Mail\Message;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Aqui podemos personalizar el email que se envia para verificar la cuenta
        // VerifyEmail::toMailUsing(function($notifiable, $url){
        //     return (new MailMessage)
        //         ->subject('Mensaje de prueba en el asunto');
        // });


    }
}
