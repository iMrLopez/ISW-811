<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'telefono','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function rol(){
      return $this->belongsTo('App\Role','role_id');
    }
    public function propiedades(){
      return $this->hasMany('App\Propiedad');
    }

    public function tieneAcceso(array $permisos){

      if($this->rol->tieneAcceso($permisos)){
        return true;
      }
      return false;
    }
    public function tieneRol($nombre){
        return $this->rol()->where('nombre',$nombre)->count()==1;
    }
}
