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
    //Get img as base64 to store on database
    if($request->file('image') != null)
    $imgData = 'data:'.mime_content_type($request->file('image')->getPathName()).';base64,'.base64_encode(file_get_contents($request->file('image')->getPathName()));

    switch($request->input('accion')){
      case 'Editar':
      $model =  Product_master::find($request->input('id'));
      $model->name = $request->input('name');
      if($request->file('image') != null)
      $model->img = $imgData;
      $model->description = $request->input('description');
      $model->cost = $request->input('cost');
      break;
      case 'Crear':
      $model = new Product_master([
        'name'=>$request->input('name'),
        'img'=>$imgData,
        'description'=>$request->input('description'),
        'cost'=>$request->input('cost')
      ]);
      break;
    }
    if($model->save()){
      $msg = array('type'=>'success','title'=>'Producto editado','contents'=>'Se ha realizado el proceso correctamente');
      return redirect()->route('CRUD.Product.index')->with('info', 'Proceso realizado correctamente')->with('msg', $msg);
    }

    return redirect()->route('CRUD.Product.index')->with('info', 'Proceso realizado correctamente');
  }

}
