<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallet_master extends Model
{
    //
    protected $table = "wallet_master";
    protected $hidden = ['availableBalance','redeemedBalance','totalBalance'];

    public function wallet_details(){
      return $this->hasMany('App\wallet_detail');
    }




}
