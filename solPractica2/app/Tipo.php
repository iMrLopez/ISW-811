<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
  public function propiedades() {
    return $this->hasMany('App\Propiedad');
  }
}
