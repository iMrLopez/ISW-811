<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_master extends Model
{
    //
    protected $table = "user_master";
    protected $fillable = ['uname','name','password','email','address','telephone','status','role'];
    protected $hidden = ['remember_token'];

    public function collectionCenter_master(){
      return $this->belongsTo('App\collectionCenter_master');
    }
}
