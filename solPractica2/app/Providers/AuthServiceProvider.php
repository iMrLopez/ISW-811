<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
      /*Permisos
      crear-prop
      grafico-prop
      pdf-prop
      */
        $this->registerPolicies();
        Gate::define('nueva-propiedad',function($user){
          return $user->tieneAcceso(['crear-prop']);
        });
        Gate::define('actualizar-propiedad',function($user,\App\Propiedad $prop){
          return  $user->tieneRol('administrador')
          or $user->id==$prop->user_id;
        });
        Gate::define('ver-todas-propiedades',function($user){
          return $user->tieneRol('administrador');
        });
        Gate::define('grafico-propiedades',function($user){
          return $user->tieneAcceso(['grafico-prop']);
        });
        Gate::define('pdf-propiedades',function($user){
          return $user->tieneAcceso(['pdf-prop']);
        });
        //
    }
}
