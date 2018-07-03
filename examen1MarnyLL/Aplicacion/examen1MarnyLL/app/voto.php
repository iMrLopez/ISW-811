<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class voto extends Model
{
  protected $fillable = ['puntos'];
  public function helado() {
      return $this->belongsTo('App\voto');
  }
}
