<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rasgo extends Model
{
  public function propiedades()
  {
      return $this->belongsToMany('App\Propiedad',
       'propiedad_rasgo',
       'rasgo_id',
       'propiedad_id')->withTimestamps();
  }
}
