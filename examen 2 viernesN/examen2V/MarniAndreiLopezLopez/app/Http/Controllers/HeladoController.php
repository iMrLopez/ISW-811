<?php

namespace App\Http\Controllers;

use App\Helado;
use App\Voto;
use App\Caracteristica;
use Storage;
use App\Charts\Graficos;
use DB;
use PDF;
use Auth;
use Gate;

use Illuminate\Http\Request;

class HeladoController extends Controller
{

  public function getIndex(){
    $caracteristicas=Caracteristica::all();
    $listado = Helado::orderBy('precioUnitario', 'desc')->paginate(6);
    return view('helado.index',['caracteristicas'=>$caracteristicas,'listado'=>$listado]);
  }

  public function getVotar($id,$puntos){
    $helado = Helado::where('id', $id)->first();
    $punto = new Voto();
    $punto->puntos=$puntos;
    $helado->votos()->save($punto);
    return redirect()->back();
  }

  public function getCrear(){
    $caracteristicas = Caracteristica::all();
    return view('helado.create', [
      'caracteristicas' => $caracteristicas]);
    }

    public function getEditar(Helado $hela){
      $helado = Helado::where('id', $hela->id)->with('votos')->first();
      $caracteristicas = Caracteristica::all();
      return view('helado.edit', ['elemento' => $helado,'caracteristicas' => $caracteristicas]);
    }

    public function postInsert(Request $request){
      $this->validate($request, [
        'nombre' => 'required|min:2',
        'detalle' => 'required|min:3',
        'precioUnitario' => 'required|numeric',
        'imgHelado' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $image = $request->file('imgHelado');
      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/helados');
      $image->move($destinationPath, $input['imagename']);

      $helado= new Helado();
      $helado->nombre= $request->input('nombre');
      $helado->detalle = $request->input('detalle');
      $helado->precioUnitario = $request->input('precioUnitario');

      $helado->imagen=$input['imagename'];

      $helado->user()->associate(Auth::user());

      $helado->save();
      $helado->caracteristicas()->attach($request->input('caracteristicas') === null ? [] :$request->input('caracteristicas'));

      return redirect()->route('helado.index')->with('info', 'Helado: ' . $request->input('nombre').' creado');

    }

    public function postUpdate(Helado $hela, Request $request){
      $this->validate($request, [
        'nombre' => 'required|min:2',
        'detalle' => 'required|min:3',
        'precioUnitario' => 'required|numeric',
        'imgHelado' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $helado = Helado::find($request->input('id'));

      //SAVE ONLY IF THIS A NEW IMAGE TODO
      if($request->file('imgHelado') != null){
        Storage::delete(public_path('/helados').'/'.$helado->imagen);
        $image = $request->file('imgHelado');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/helados');
        $image->move($destinationPath, $input['imagename']);
        $helado->imagen=$input['imagename'];
      }

      $helado->nombre= $request->input('nombre');
      $helado->detalle = $request->input('detalle');
      $helado->precioUnitario = $request->input('precioUnitario');


      $helado->save();
      $helado->caracteristicas()->sync($request->input('caracteristicas') === null ? [] :
      $request->input('caracteristicas'));
      return redirect()->route('helado.index')->with('info', 'Helado: ' . $request->input('nombre').' creado');
    }


    public function grafico(){
      $chart = new Graficos();
      $titulo="Sumatoria de votos por helados";

      $datos = Voto::select(DB::raw("sum(puntos) as sumatoria"),DB::raw("helado_id"))
      ->groupby(DB::raw("helado_id"))
      ->with('Helado')->orderBy(DB::raw("sumatoria"), 'DSC')->get();

      $etiquetas=[];
      foreach($datos as $actual){
        $etiquetas[]  = $actual->Helado->nombre;
      }

      $cantidades=$datos->pluck('sumatoria');

      $chart->labels($etiquetas);

      $dataset=$chart->dataset($titulo, 'bar',$cantidades);
      $dataset->backgroundColor(['#a9cce3', ' #a9dfbf', '#fad7a0','#c39bd3','#f9e79f','#a3e4d7', '#fadbd8', '#e59866']);
      $dataset->color(['#2980b9', '#52be80', '#f0b27a','#7d3c98', '#f4d03f','#48c9b0','#f1948a','#d35400']);

      return view('helado.grafico', ['chart' => $chart]);
    }

    public function descargarPDF(){
      $datos= Helado::orderBy('precioUnitario', 'desc')->where('user_id',Auth::user()->id)->get();
      $pdf=PDF::loadView('helado.reportePDF',compact('datos'));
      return $pdf->download('reportePDF-'.time().'.pdf');
    }

}
