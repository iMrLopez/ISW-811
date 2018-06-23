<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    /*
    $table->increments('id');
    $table->string('nombre', 100);
    $table->text('ubicacion');
    $table->tinyInteger('cantidadHabitaciones');
    $table->tinyInteger('cantidadCarros');
    $table->integer('tipo_id')->unsigned();
    */

    protected $fillable = [
        'nombre','ubicacion','cantidadHabitaciones','cantidadCarros','tipo_id'
    ];


    public function tipo_propiedad() {
      return $this->belongsTo('App\Tipo');
    }

    public function rasgo_propiedad() {
      return $this->hasMany('App\Rasgo');
    }

}
