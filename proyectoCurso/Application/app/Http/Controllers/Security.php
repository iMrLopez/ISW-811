<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\User_master;

class Security extends Controller
{
  //
  public function doLogin(Request $request){
      foreach(User_master::where(array('uname' => $request->username))->get() as $user){
        if (Hash::check($request->password, $user['password'])) { //If the password matches create session and redirect to home (password is hashed)

          session(
            ['user'=>
              [
                'loggedin' => true,
                'instance'=>$user
              ]
            ]
          );
          //dd(session()->get('user.instance.id'));
          session()->save();
          return Redirect()->route('app.main'); //Redirect to user login
        }
      }
      return Redirect()->route('security.startLogin'); //Redirect to user login
  }

  public function doLogout(Request $request){
      session()->flush();
      return Redirect()->route('security.startLogin'); //Redirect to user login
  }

  public function doChangePassword(Request $request){ //TODO


    if(Hash::check($request->input('oldPass'),session('user.instance.password'))){
      if($request->input('npass1') === $request->input('npass2')){

        $model =  User_master::find($request->input('id'));
        $model->password = bcrypt($request->input('npass1'));
        $model->save();

        $msg = array('type'=>'success','title'=>'Contraseña modificada','contents'=>'Se ha realizado el proceso correctamente');
      }else{
          $msg = array('type'=>'error','title'=>'Contraseña NO modificada','contents'=>'No se ha realizado el proceso, las contraseñas no coincidian');
      }
    }else{
          $msg = array('type'=>'error','title'=>'Contraseña NO modificada','contents'=>'No se ha realizado el proceso, la contraseña antigua no era la correcta');
    }
    return redirect()->route('app.myProfile')->with('msg', $msg);
  }




}
