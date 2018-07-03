<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class caracteristica extends Model
{
  public function helados()
  {
      return $this->belongsToMany('App\helado',
       'helado_caracteristica',
       'helado_id',
       'caracteristica_id')->withTimestamps();
  }
}
