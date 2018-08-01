<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallet_master extends Model
{
    //
    protected $table = "wallet_master";
    protected $hidden = ['redeemedBalance','totalBalance','actualBalance'];

    public function wallet_details(){
      return $this->hasMany('App\wallet_detail');
    }

    public function user_master(){
      return $this->belongsTo('App\User_master', 'clientId', 'id');
    }

}
