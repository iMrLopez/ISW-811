<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\User_master;

class Security extends Controller
{
  //
  public function doLogin(Request $request)
  {
      foreach(User_master::where(array('uname' => $request->username))->get() as $user){
        if (Hash::check($request->password, $user['password'])) { //If the password matches create session and redirect to home (password is hashed)
          session(
            ['user'=>
              [
                'loggedin' => true,
                'type' => $user['role'],
                'name' => $user['name'],
              ]
            ]
          );
          //dd(session()->get('user'));
          session()->save();
          return Redirect()->route('app.main'); //Redirect to user login
        }
      }
      return Redirect()->route('security.startLogin'); //Redirect to user login
  }

  public function doLogout(Request $request)
  {
      session()->flush();
      return Redirect()->route('security.startLogin'); //Redirect to user login
  }


}
