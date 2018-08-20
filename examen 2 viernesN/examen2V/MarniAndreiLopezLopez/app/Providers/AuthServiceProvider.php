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
        Gate::define('crearH',function($user){
          return $user->tieneAcceso(['crear-h']);
        });

        Gate::define('actualizarH',function($user,\App\Helado $hela){
          return $user->id==$hela->user_id;
        });

        Gate::define('graficoH',function($user){
          return $user->tieneRol('administrador');
        });
    }
}
