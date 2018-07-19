<?php

namespace App\Http\Controllers;

use App\User_master;

use Illuminate\Http\Request;

class userMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function list($role = 'client')
    {
      $Query_CollCenter = User_master::where('role',$role)->get();
      return view('app.CRUD.userMaster.list',['data' => $Query_CollCenter, 'meta'=>array('role'=>$role)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($role = 'client')
    {
        $this->validateRoleRequested($role); //Validate so no user is created as admin
        $model = new User_master(['role'=> $role]);
        return view('app.CRUD.userMaster.form',['data'=>$model,'meta'=>array('accion'=>'Crear')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\collectionCenter_master  $collectionCenter_master
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
      $model =  User_master::find((get_object_vars(json_decode($request->input('object'))))['id']);
      return view('app.CRUD.userMaster.form',['data'=>$model,'meta'=>array('accion'=>'Editar')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //TODO finish this
    {
      $this->validateRoleRequested($request->input('role')); //Validate so no user is created as admin
      switch($request->input('accion')){
        case 'Password': //Used to modify only the password of the user
          $model =  User_master::find($request->input('id'));
          $model->name = $request->input('name');
          $model->description = $request->input('name');
          $model->CRCValue = $request->input('CRCValue');
        break;
        case 'Editar': //Used to modify the data of this user
          $model =  User_master::find($request->input('id'));
          $model->name = $request->input('name');
          $model->description = $request->input('name');
          $model->CRCValue = $request->input('CRCValue');
        break;
        case 'Crear': //Used to create a new user
          $model = new User_master([
              'name'=>$request->input('name'),
              'description'=>$request->input('description'),
              'CRCValue'=>$request->input('CRCValue')
            ]);
        break;
      }
        $model->save();

        if($request->input('role') == 'client'){ //Redirect to app main if this is a new client
          return redirect()->route('app.main')->with('info', 'Bienvenido a Ecolones!');
        }else{ //Redirect to listing if this is a collection center user
          return redirect()->route('RUD.GestionDeUsuarios.list',array('role'=>$request->input('role')))->with('info', 'Proceso realizado correctamente');
        }

    }


    private function validateRoleRequested($role){ //Used to validate that we are not creating an admin user
      if(!($role == 'client' || $role == 'collection')){
          return redirect()->route('mainAppRoute')->with('info', 'No es posible');
      }
    }
}
