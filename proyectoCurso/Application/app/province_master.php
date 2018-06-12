<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class province_master extends Model
{
    //

    protected $table = 'province_master';
    protected $fillable = ['name'];

    public function collectionCenter_masters{
      return $this->hasMany('App\collectionCenter_master');
    }


}
