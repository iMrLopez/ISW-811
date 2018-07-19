<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coupon_master extends Model
{
    protected $table = "coupon_master";
    protected $fillable = ['name','description','CRCValue'];
  //  protected $hidden = ['id'];
}
