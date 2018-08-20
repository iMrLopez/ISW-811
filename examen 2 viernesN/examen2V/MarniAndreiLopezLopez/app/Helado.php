<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Helado extends Model
{
  protected $fillable = ['nombre', 'detalle',
  'precioUnitario','imagen'];
  public function votos() {
    return $this->hasMany('App\Voto');
  }
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function caracteristicas()
  {
    return $this->belongsToMany('App\Caracteristica',
    'helado_caracteristica',
    'helado_id',
    'caracteristica_id')->withTimestamps();
  }

  public function setNombreAttribute($value){
    //Devuelve la cadena con todos los caracteres alfabéticos convertidos a minúscula.
    $this->attributes['nombre']=mb_strtoupper($value);
  }
  public function getNombreAttribute($value){
    return mb_strtoupper($value);
  }
}
