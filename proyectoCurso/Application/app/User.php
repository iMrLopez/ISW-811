<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name','address','telephone','status', 'email', 'password','role','collectionCenter_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function collectionCenter(){
      return $this->belongsTo('App\collectionCenter_master', 'collectionCenter_id','id');
    }

    public function wallet_master(){
      return $this->hasOne('App\wallet_master','clientId','username');
    }


}
