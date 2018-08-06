<?php

namespace App\Http\Controllers;

use App\User_master;
use App\collectionCenter_master;

use Illuminate\Http\Request;

class userMasterController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

  public function list($role = 'client'){
    $Query_CollCenter = User_master::where('role',$role)->with('collectionCenter')->get();
    return view('app.CRUD.userMaster.list',['data' => $Query_CollCenter, 'meta'=>array('role'=>$role)]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create($role = 'client'){
    $this->validateNoStoreOfAdminUser($role); //Validate so no user is created as admin

    $model = new User_master(['role'=> $role]);
    $collectionCenter_master = collectionCenter_master::pluck('name','id');

    return view('app.CRUD.userMaster.form',['data'=>$model,'meta'=>array('accion'=>'Crear')]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\collectionCenter_master  $collectionCenter_master
  * @return \Illuminate\Http\Response
  */
  public function edit(Request $request){
    $model =  User_master::with('collectionCenter')->find((get_object_vars(json_decode($request->input('object'))))['id']);
    $collectionCenter_master = collectionCenter_master::pluck('name','id');
    return view('app.CRUD.userMaster.form',['data'=>$model,'meta'=>array('accion'=>'Editar')]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request){
    $this->validateNoStoreOfAdminUser($request->input('role')); //Validate so no user is created as admin
    $this->valNoCollByNoAdmin($request->input('role')); //Validate so no collection user is not created by non admin

    switch($request->input('accion')){
      case 'Editar': //Used to create a new user
      $model =  User_master::find($request->input('id'));
      break;
      case 'Crear': //Used to create a new user
      $model = new User_master();
      $model->role = $request->input('role');
      $model->password = bcrypt($request->input('password'));
      break;
    }

    $model->status = $request->input('status');
    $model->uname = $request->input('uname');
    $model->name = $request->input('name');
    $model->email = $request->input('email');
    $model->address = $request->input('address');
    $model->telephone = $request->input('telephone');

    if($model->save()){ //Redirect to app main if this is a new client
      $msg = array('type'=>'success','title'=>'Proceso realizado correctamente','contents'=>'Proceso realizado correctamente');
      return redirect()->route('CRUD.GestionDeUsuarios.list')->with('msg', $msg);
    }else{ //Redirect to listing if this is an admin
      $msg = array('type'=>'error','title'=>'Proceso no realizado','contents'=>'Proceso no realizado');
      return redirect()->route('CRUD.GestionDeUsuarios.list',array('role'=>$request->input('role')))->with('msg', $msg);
    }

  }

  private function validateNoStoreOfAdminUser($role){ //Validate so no user is created as admin($role){ //Used to validate that we are not creating an admin user
    if(!($role == 'client' || $role == 'collection')){
      $msg = array('type'=>'error','title'=>'Bloqueado','contents'=>'El proceso ha sido bloqueado por el sistema');
      return redirect()->route('mainAppRoute')->with('msg', $msg);
    }
  }

  private function valNoCollByNoAdmin($role){
    if($role == 'collection' && session('user.instance.role') === 'admin'){
      $msg = array('type'=>'error','title'=>'Bloqueado','contents'=>'El proceso ha sido bloqueado por el sistema');
      return redirect()->route('mainAppRoute')->with('msg', $msg);
    }
  }

  public function getUserWithWallet($uname){

    $resultado = ((User_master::with('wallet_master')->where('uname',$uname)));
    dd($resultado);
    return response ($resultado);
  }



}
