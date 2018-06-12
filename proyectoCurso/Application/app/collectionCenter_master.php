<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class collectionCenter_master extends Model
{
    //
    protected $table = 'collectionCenter_master';
    protected $fillable = ['address','status','description'];

    public function province_master{
      return $this->belongsTo('App\province_master');
    }
}
