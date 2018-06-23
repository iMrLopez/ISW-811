<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    // $table->increments('id');  $table->string('nombre');

    protected $fillable = [
        'nombre'
    ];


    public function likes() {
      return $this->hasMany('App\Propiedad');
    }

}
