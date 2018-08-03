<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material_master;
use App\collectionCenter_master;

class Site extends Controller
{
    //

    public function index(){
      return view('site.index',array('materialMaster'=>Material_master::all(),'collCntrMaster'=>collectionCenter_master::with('province_master')->get()));
    }
}
