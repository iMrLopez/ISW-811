<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_master extends Model
{
    protected $table = "Product_master";
    protected $fillable = ['name','description','cost','img'];
  //  protected $hidden = ['id'];
}
