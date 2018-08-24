<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material_master;
use App\Product_master;
use App\collectionCenter_master;
use App\User;


class HomeController extends Controller
{

  public function __construct(){
    //dd(Auth::user());
    $this->middleware('auth');
  }

  public function index(){
    $data = array( //Get the data for the dashboard updated as of today
      'Material_master' => Material_master::count(),
      'Product_master' => Product_master::count(),
      'collectionCenter_master' => collectionCenter_master::count(),
      'User' => User::where('role','Client')->count(),
    );
    return view('app.dashboard.general',['data'=> $data]);
  }

}
