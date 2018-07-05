<?php

namespace App\Http\Controllers;

use App\collectionCenter_master;
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
        //dd($Query_CollCenter);
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
        return view('app.CRUD.collectionCenter.form',['data'=>$model,'meta'=>array('accion'=>'Agregar')]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\collectionCenter_master  $collectionCenter_master
     * @return \Illuminate\Http\Response
     */
    public function show(collectionCenter_master $collectionCenter_master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\collectionCenter_master  $collectionCenter_master
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
      $model = new collectionCenter_master();
      $model -> fill(get_object_vars(json_decode($request->input('object'))));

      return view('app.CRUD.collectionCenter.form',['data'=>$model,'meta'=>array('accion'=>'Editar')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\collectionCenter_master  $collectionCenter_master
     * @return \Illuminate\Http\Response
     */
    public function destroy(collectionCenter_master $collectionCenter_master)
    {
        //
    }
}
