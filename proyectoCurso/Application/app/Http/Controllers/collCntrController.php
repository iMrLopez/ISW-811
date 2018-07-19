<?php

namespace App\Http\Controllers;

use App\collectionCenter_master;
use App\province_master;
use App\User_master;
use Illuminate\Http\Request;

class collCntrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Query_CollCenter = collectionCenter_master::with('province_master')/*->orderBy('preciounitario', 'desc')*/->get();
        return view('app.CRUD.collectionCenter.list',['data' => $Query_CollCenter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new collectionCenter_master();
        $View_users = User_master::where('role','collection')->pluck('name','id');
        $View_provinces = province_master::pluck('name','id');
        return view('app.CRUD.collectionCenter.form',['data'=>$model,'meta'=>array('accion'=>'Crear','provinces'=>$View_provinces,'users'=>$View_users)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\collectionCenter_master  $collectionCenter_master
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
      $model =  collectionCenter_master::find((get_object_vars(json_decode($request->input('object'))))['id']);
      $View_users = User_master::where('role','collection')->pluck('name','id');
      $View_provinces = province_master::pluck('name','id');
      return view('app.CRUD.collectionCenter.form',['data'=>$model,'meta'=>array('accion'=>'Editar','provinces'=>$View_provinces,'users'=>$View_users)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      switch($request->input('accion')){
        case 'Editar':
          $model =  collectionCenter_master::find($request->input('id'));
          $model->name = $request->input('name');
          $model->address = $request->input('address');
          $model->status = $request->input('status');
        break;
        case 'Crear':
          $model = new collectionCenter_master([
              'name'=>$request->input('name'),
              'address'=>$request->input('address'),
              'status'=>$request->input('status')
            ]);
        break;
      }
        $model->province_master()->associate(province_master::find($request->input('province_master_id')));
        $model->user_master()->associate(user_master::find($request->input('user_master_id')));
        $model->save();

        return redirect()->route('CRUD.collCenter.index')->with('info', 'Proceso realizado correctamente');
    }
}
