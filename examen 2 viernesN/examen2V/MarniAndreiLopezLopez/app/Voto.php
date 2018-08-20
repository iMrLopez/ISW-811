<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
  public function helado() {
    return $this->belongsTo('App\Helado');
  }
}
