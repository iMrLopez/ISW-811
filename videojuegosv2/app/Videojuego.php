<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model{
  protected $fillable=['nombre','descripcion',
  'fechaEstrenoInicial','imagen'];

  public function likes() {
   return $this->hasMany('App\Like');
  }
  public function plataformas() {
    return $this->belongsToMany('App\Plataforma',
    'videojuego_plataforma',
    'videojuego_id',
    'plataforma_id'
    )->withTimestamps();
  }
  public function user(){
    return $this->belongsTo('App\User');
  }

  public function setNombreAttribute($value) {
    $this->attributes['nombre'] = strtolower($value);
  }
  public function getNombreAttribute($value) {
    return strtoupper($value);
  }



/*  public function getVideojuegos($session){
    //No existe, precargar datos
      if(!$session->has('videojuegos')){
        $this->crearDatos($session);
      }
      return $session->get('videojuegos');
  }
  public function getVideojuego($session,$id){
    //No existe, precargar datos
      if(!$session->has('videojuegos')){
        $this->crearDatos($session);
      }
      return $session->get('videojuegos')[$id];
  }
  public function addVideojuego($session,
  $nombre, $descripcion,$fechaEstrenoInicial)
    {
        if (!$session->has('videojuegos')) {
            $this->crearDatos($session);
        }
        $Videojuegos = $session->get('videojuegos');
        array_push($Videojuegos, [
          'nombre' => $nombre,
        'descripcion' => $descripcion,
        'fechaEstrenoInicial' => $fechaEstrenoInicial
      ]);
        $session->put('videojuegos', $Videojuegos);
    }
    public function editVideojuego($session,
    $id,
    $nombre, $descripcion,$fechaEstrenoInicial)
      {

          $Videojuegos = $session->get('videojuegos');
          $Videojuegos[$id]= [
            'nombre' => $nombre,
          'descripcion' => $descripcion,
          'fechaEstrenoInicial' => $fechaEstrenoInicial
        ];
          $session->put('videojuegos', $Videojuegos);
      }
  private function crearDatos($session){
    $vj = [
          [
              'nombre' => 'Super Mario Odyssey',
              'descripcion' => 'Es un videojuego de plataformas de mundo abierto para Nintendo Switch.',
              'fechaEstrenoInicial'=> '2017-10-21'
          ],
          [
                'nombre' => 'Crash Bandicoot',
                'descripcion' => 'Es un videojuego de plataformas creado por Naughty Dog para la videoconsola PlayStation.',
                'fechaEstrenoInicial'=> '1996-09-09'
          ],
          [
                'nombre' => 'The Legend of Zelda: Breath of the Wild',
                'descripcion' => 'Un mundo de aventuras, exploración y descubrimientos',
                'fechaEstrenoInicial'=> '2017-03-03'
          ]
        ];
      $session->put('videojuegos',$vj);
  }*/
}
