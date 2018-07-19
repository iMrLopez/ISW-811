<?php

namespace App\Http\Controllers;

use App\coupon_master;

use Illuminate\Http\Request;

class couponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $Query_CollCenter = coupon_master::all();
        return view('app.CRUD.couponMaster.list',['data' => $Query_CollCenter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new coupon_master();
        return view('app.CRUD.couponMaster.form',['data'=>$model,'meta'=>array('accion'=>'Crear')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\collectionCenter_master  $collectionCenter_master
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
      $model =  coupon_master::find((get_object_vars(json_decode($request->input('object'))))['id']);
      return view('app.CRUD.couponMaster.form',['data'=>$model,'meta'=>array('accion'=>'Editar')]);
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
          $model =  coupon_master::find($request->input('id'));
          $model->name = $request->input('name');
          $model->description = $request->input('name');
          $model->CRCValue = $request->input('CRCValue');
        break;
        case 'Crear':
          $model = new coupon_master([
              'name'=>$request->input('name'),
              'description'=>$request->input('description'),
              'CRCValue'=>$request->input('CRCValue')
            ]);
        break;
      }
        $model->save();
        return redirect()->route('CRUD.CuponesDeCanje.index')->with('info', 'Proceso realizado correctamente');
    }
}
