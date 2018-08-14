<?php

namespace App\Http\Controllers;

use App\Product_master;

use Illuminate\Http\Request;

class ProductController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $Query_CollCenter = Product_master::all();
    return view('app.CRUD.ProductMaster.list',['data' => $Query_CollCenter]);
  }

  public function create(){
    $model = new Product_master();
    return view('app.CRUD.ProductMaster.form',['data'=>$model,'meta'=>array('accion'=>'Crear')]);
  }

  public function edit(Request $request){
    $model =  Product_master::find((get_object_vars(json_decode($request->input('object'))))['id']);
    return view('app.CRUD.ProductMaster.form',['data'=>$model,'meta'=>array('accion'=>'Editar')]);
  }

  public function store(Request $request){

    switch($request->input('accion')){
      case 'Editar':
      $model =  Product_master::find($request->input('id'));
      $model->name = $request->input('name');
      $model->description = $request->input('description');
      $model->cost = $request->input('cost');
      break;
      case 'Crear':
      $model = new Product_master([
        'name'=>$request->input('name'),
        'description'=>$request->input('description'),
        'cost'=>$request->input('cost')
      ]);
      break;
    }
    $model->save();
    return redirect()->route('CRUD.Product.index')->with('info', 'Proceso realizado correctamente');
  }

}
