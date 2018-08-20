<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable=['nombre','permissions'];

    public function users(){
      return $this->hasMany('App\User');
    }
    //Role
  public function tieneAcceso(array $permisos){
      foreach ($permisos as $permiso) {
        if($this->tienePermiso($permiso)){
          return true;
        }
      }
      return false;
    }

    protected function tienePermiso(string $permiso){
      $permisos=json_decode($this->permissions,true);
      return $permisos[$permiso]??false;
    }
}
