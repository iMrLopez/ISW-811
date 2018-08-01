<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\User_master;
use App\wallet_master;

class Security extends Controller
{
  //
  public function doLogin(Request $request){
    foreach(User_master::with('wallet_master')->where(array('uname' => $request->username))->get() as $user){
      if (Hash::check($request->password, $user['password'])) { //If the password matches (password is hashed)
        if(!($user['role'] == 'collection' && $user['status'] == 'Inactivo')){ //If this is a not an inactive collection center
          session(
            ['user'=>
            [
              'loggedin' => true,
              'instance'=>$user
            ]
          ]
        );
        session()->save();
        return Redirect()->route('app.main'); //Redirect to app
      }
    }
  }
  return Redirect()->route('security.startLogin'); //Redirect to user login (password was not ok, the user doesnt exist or is an inactive collection center)
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

public function doRegister(Request $request){

  if (!is_null(User_master::where('uname', $request->input('uname'))->first())) { //If the user exists on the db
    $msg = array('type'=>'error','title'=>'Proceso no realizado','contents'=>'El usuario ya estaba registrado?');
    return redirect()->route('security.startRegister')->with('msg', $msg);
  } else {
    //Create this client
    $user = new User_master;
    $user->role = $request->input('role');
    $user->status = $request->input('status');
    $user->uname = $request->input('uname');
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->address = $request->input('address');
    $user->telephone = $request->input('telephone');
    $user->password = bcrypt($request->input('password'));
    $user->save();
    //Create the wallet for this client
    $wallet = new wallet_master;
    $wallet->redeemedBalance = 0.0;
    $wallet->actualBalance = 0.0;
    $wallet->totalBalance = 0.0;
    $wallet->user_master()->associate($user);
    $wallet->save();

    //Redirect to login
    $msg = array('type'=>'success','title'=>'Proceso realizado correctamente','contents'=>'Ahora puedes iniciar sesion');
    return redirect()->route('security.startLogin')->with('msg', $msg);
  }

}


}
