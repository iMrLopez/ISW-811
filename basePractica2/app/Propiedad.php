<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
  protected $fillable = ['nombre', 'ubicacion',
  'cantidadHabitaciones','cantidadCarros','imagen'];
    public function tipo() {
      return $this->belongsTo('App\Tipo','tipo_id');
    }
    public function rasgos()
    {
        return $this->belongsToMany('App\Rasgo',
         'propiedad_rasgo',
         'propiedad_id',
         'rasgo_id')->withTimestamps();
    }
  
    public function user(){
      return $this->belongsTo('App\User');
    }
}
