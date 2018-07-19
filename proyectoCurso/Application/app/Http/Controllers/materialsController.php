<?php

namespace App\Http\Controllers;

use App\Material_master;

use Illuminate\Http\Request;

class materialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Query_CollCenter = Material_master::all();
        return view('app.CRUD.materialTypes.list',['data' => $Query_CollCenter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Material_master();
        return view('app.CRUD.materialTypes.form',['data'=>$model,'meta'=>array('accion'=>'Crear')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\collectionCenter_master  $collectionCenter_master
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
      $model =  Material_master::find((get_object_vars(json_decode($request->input('object'))))['id']);
      return view('app.CRUD.materialTypes.form',['data'=>$model,'meta'=>array('accion'=>'Editar')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Get img as base64 to store on database
      if($request->file('image') != null)
      $imgData = 'data:'.mime_content_type($request->file('image')->getPathName()).';base64,'.base64_encode(file_get_contents($request->file('image')->getPathName()));

      switch($request->input('accion')){
        case 'Editar':
          $model =  Material_master::find($request->input('id'));
          $model->name = $request->input('name');
          if($request->file('image') != null)
          $model->img = $imgData;
          $model->CRCValue = $request->input('CRCValue');
          $model->status = $request->input('status');
          $model->HTMLColor = $request->input('HTMLColor');
        break;
        case 'Crear':
          $model = new Material_master([
              'name'=>$request->input('name'),
              'img'=>$imgData,
              'CRCValue'=>$request->input('CRCValue'),
              'status'=>$request->input('status'),
              'HTMLColor'=>$request->input('HTMLColor')
            ]);
        break;
      }
        $model->save();
        return redirect()->route('CRUD.MaterialReciclable.index')->with('info', 'Proceso realizado correctamente');
    }
}
