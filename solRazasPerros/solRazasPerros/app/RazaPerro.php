<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class RazaPerro extends Model{

  protected $fillable=['nombre', 'descripcion', 'tamanos_id', 'alturaInicial', 'alturaFinal', 'postImage'];


    public function tamanos(){
      return $this->belongsTo('App\Tamano','tamano_id');
    }

    public function temperamentos(){
      return $this->belongsToMany('App\Temperamento',
      'razaperro_temperamento',
      'razaperro_id',
      'temperamento_id')->withTimestamps();
    }

}
