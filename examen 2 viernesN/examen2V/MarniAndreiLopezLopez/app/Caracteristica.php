<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
  public function helados()
  {
    return $this->belongsToMany('App\Helado',
     'helado_caracteristica',
      'caracteristica_id',
       'helado_id')->withTimestamps();
  }
}
