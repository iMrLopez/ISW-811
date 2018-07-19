<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material_master extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'Material_master';
    protected $fillable = ['name','img','CRCValue','status','HTMLColor'];
}
