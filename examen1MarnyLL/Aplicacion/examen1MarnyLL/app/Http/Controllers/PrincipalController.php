<?php

namespace App\Http\Controllers;

use App\helado;
use App\voto;
use App\caracteristica;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{

  public function index($id = null)
  {
    //Obtener los datos de la BD
    $Query_helados_resultado = helado::with('votos', 'caracteristicas')->orderBy('preciounitario', 'desc')->get();
    $View_precioMax = helado::orderBy('preciounitario', 'desc')->first()->precioUnitario;
    $View_caracteristicas = caracteristica::all();
    //El ID es diferente de nulo
    if($id != null){
      //$Query_helados_resultado = helado::with('votos', 'caracteristicas')->where('caracteristica_id',$id)->orderBy('preciounitario', 'desc')->get();
	  //$Query_helados_resultado = Caracteristica::find($id)->helados;
      $View_helados = array();
      foreach($Query_helados_resultado as $temporal){
        foreach($temporal->caracteristicas as $caracteristica){
          if($caracteristica->id == $id)
          array_push($View_helados, $temporal);
        }
      }
    }else{
      $View_helados = $Query_helados_resultado;
      //$View_helados = helado::with('votos', 'caracteristicas')->orderBy('preciounitario', 'desc')->get();
    }
    return view('helado.index', ['helados' => $View_helados,'caracteristicas'=>$View_caracteristicas, 'precioMax' => $View_precioMax]);
  }

  public function vote($id,$voto)
  {
    $helado = helado::find($id);
    $voto = new voto (['puntos' => $voto]);
    $voto->helado()->associate($helado);
    $voto->save();
    return redirect()->route('helado.principal'); //redirigir a la ruta index
  }

  public function getEditar($helado)
  {

    $View_helado = helado::with('caracteristicas')->find($helado);
    $View_caracteristicas = caracteristica::all();
    $View_users = caracteristica::all();
    return view('helado.edit',['helado'=>$View_helado,'caracteristicas'=>$View_caracteristicas]);
    //dd($helado);
  }


  public function postUpdate(Request $request)
  {
    $this->validate($request, [
      'nombre' => 'required|min:2',
      'detalle' => 'required|min:3',
      'precioUnitario' => 'required|numeric|min:1'
    ]);

    $helado = helado::find($request->input('id'));

    $helado->nombre = $request->input('nombre');
    $helado->detalle = $request->input('detalle');
    $helado->precioUnitario = $request->input('precioUnitario');
    $helado->save();

    $helado->caracteristicas()->sync($request->input('caracteristicas')=== null ? [] : $request->input('caracteristicas'));
    return redirect()->route('helado.principal')->with('info', 'Helado: ' . $request->input('nombre').' editado correctamente');; //redirigir a la ruta index

  }


}
