<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallet_master extends Model
{
    //
    protected $primaryKey = "clientId";
    protected $table = "wallet_master";
    protected $fillable = ['redeemedBalance','totalBalance','actualBalance'];

    public function wallet_details(){
      return $this->hasMany('App\wallet_detail', 'walletId', 'clientId');
    }

    public function User(){
      return $this->belongsTo('App\User', 'clientId', 'id');
    }

}
