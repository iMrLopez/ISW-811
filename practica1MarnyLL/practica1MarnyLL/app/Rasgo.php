<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rasgo extends Model
{
    //

    protected $fillable = [
        'nombre'
    ];



    public function rasgo_propiedad() {
      return $this->hasMany('App\Propiedad');
    }
}
