<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class collectionCenter_master extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'collectionCenter_master';
    protected $fillable = ["name",'address','status','province_master_id','user_master_id'];
    //protected $hidden = ["id"];

    public function province_master(){
      return $this->belongsTo('App\province_master');
    }

    public function user_master(){
      return $this->belongsTo('App\user_master');
    }
}
