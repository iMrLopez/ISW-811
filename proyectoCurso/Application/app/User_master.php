<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_master extends Model
{
    //
    protected $table = "user_master";
    protected $fillable = ['uname','password','name','email','address','telephone','status','role'];
    protected $hidden = ['password','remember_token'];
}
