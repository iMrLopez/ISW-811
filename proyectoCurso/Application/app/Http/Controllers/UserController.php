<?php

namespace App\Http\Controllers;

use App\User;
use App\collectionCenter_master;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

  //List the users (defaults to client role)
  public function list($role = 'client'){
    $Query_CollCenter = User::where('role',$role)->with('collectionCenter')->get();
    return view('app.CRUD.User.list',['data' => $Query_CollCenter, 'meta'=>array('role'=>$role)]);
  }

  //Create the user
  public function create(){
    $model = new User(['role'=> 'collection']);
    $collectionCenter_master = collectionCenter_master::pluck('name','id');
    return view('app.CRUD.User.form',['data'=>$model,'collectionCenter_master'=>$collectionCenter_master,'meta'=>array('accion'=>'Crear')]);
  }

  //Get the edition of collection center
  public function edit(Request $request){
    $model =  User::with('collectionCenter')->find((get_object_vars(json_decode($request->input('object'))))['id']);
    $collectionCenter_master = collectionCenter_master::pluck('name','id');
    return view('app.CRUD.User.form',['data'=>$model,'collectionCenter_master'=>$collectionCenter_master,'meta'=>array('accion'=>'Editar')]);
  }

  //Store an user (either edit or create)
  public function store(Request $request){
    $this->validateNoStoreOfAdminUser($request->input('role')); //Validate so no user is created as admin
    $this->valNoCollByNoAdmin($request->input('role')); //Validate so no collection user is not created by non admin

    switch($request->input('accion')){
      case 'Editar': //Used to create a new user
      $model =  User::find($request->input('id'));
      break;
      case 'Crear': //Used to create a new user
      $model = new User();
      $model->role = $request->input('role');
      $model->password = bcrypt($request->input('username'));
      break;
    }
    $model->collectionCenter_id = $request->input('collectionCenter_id');
    $model->status = $request->input('status');
    $model->username = $request->input('username');
    $model->name = $request->input('name');
    $model->email = $request->input('email');

    if($model->save()){ //Redirect to app main if this is a new client
      $msg = array('type'=>'success','title'=>'Proceso realizado correctamente','contents'=>'Proceso realizado correctamente');
      return redirect()->route('CRUD.GestionDeUsuarios.list')->with('msg', $msg);
    }else{ //Redirect to listing if this is an admin
      $msg = array('type'=>'error','title'=>'Proceso no realizado','contents'=>'Proceso no realizado');
      return redirect()->route('CRUD.GestionDeUsuarios.list',array('role'=>$request->input('role')))->with('msg', $msg);
    }

  }

  //Used in the post of the myProfile section
  public function doChangePassword(Request $request){ //TODO
    //if(Hash::check($request->input('oldPass'),session('user.instance.password'))){
    if(TRUE){
      if($request->input('npass1') === $request->input('npass2')){

        $model =  User::find($request->input('id'));
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

  //Validate so no user is created as admin($role){ //Used to validate that we are not creating an admin user
  private function validateNoStoreOfAdminUser($role){
    if(!($role == 'client' || $role == 'collection')){
      $msg = array('type'=>'error','title'=>'Bloqueado','contents'=>'El proceso ha sido bloqueado por el sistema');
      return redirect()->route('app.appEco')->with('msg', $msg);
    }
  }

  //Validate that no collection center is created by a non admin user
  private function valNoCollByNoAdmin($role){
    if($role == 'collection' && Auth::user()->role === 'admin'){
      $msg = array('type'=>'error','title'=>'Bloqueado','contents'=>'El proceso ha sido bloqueado por el sistema');
      return redirect()->route('app.appEco')->with('msg', $msg);
    }
  }

  //API -> Used to get a JSON of the client
  public function getUserWithWallet($username){
    return response()->json(User::with('wallet_master')->where('username',$username)->get());
  }


}
