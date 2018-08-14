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
    $this->registerPolicies();

    Gate::define('nueva-propiedad', function ($user) {
      return $user->tieneAcceso(['crear-prop']);
      //return $user->id == $post->user_id;
    });

    Gate::define('actualizar-propiedad', function ($user, \App\Propiedad $propiedad) {
      return $user->tieneRol('administrador') OR ($user->id == $propiedad->user_id); //TODO
    });

    Gate::define('ver-todas-propiedad', function ($user, $post) {
        return $user->tieneRol('administrador');
    });

    Gate::define('grafico-propiedades', function ($user, $post) {
        return $user->tieneAcceso(['grafico-prop']);
    });

    Gate::define('pdf-propiedades', function ($user, $post) {
        return $user->tieneAcceso('pdf-prop');
    });

    //
  }
}
