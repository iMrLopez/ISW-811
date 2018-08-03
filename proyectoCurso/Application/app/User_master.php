<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_master extends Model
{
    //
    protected $table = "user_master";
    protected $primaryKey = 'id';
    protected $fillable = ['uname','name','password','email','address','telephone','status','role'];
    protected $hidden = ['remember_token'];

    public function collectionCenter(){
      return $this->hasOne('App\collectionCenter_master', 'user_master_id', 'id');
    }

    public function wallet_master(){
      return $this->hasOne('App\wallet_master','clientId','id');
    }
}
