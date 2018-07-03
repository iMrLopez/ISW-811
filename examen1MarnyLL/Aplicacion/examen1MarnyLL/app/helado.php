<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class helado extends Model
{
    //
    protected  $primaryKey = 'id';
    protected $fillable = ['nombre', 'detalle','precioUnitario'];

    public function votos() {
      return $this->hasMany('App\voto');
      }

    public function caracteristicas()
    {
        return $this->belongsToMany('App\caracteristica',
         'helado_caracteristica',
         'helado_id',
         'caracteristica_id')->withTimestamps();
    }
}
