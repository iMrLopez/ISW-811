<?php

namespace App\Http\Controllers;

use App\Propiedad;
use App\Tipo;
use App\Rasgo;
use Gate;
use App\Charts\Graficos;
use DB;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropiedadController extends Controller
{
    public function getIndex(){
      $titulo="Lista de propiedades";
        $tipos = Tipo::all();
      $propiedades = Propiedad::orderBy('nombre', 'desc')->paginate(3);
      return view('propiedad.index',
      ['propiedades'=>$propiedades,
      'tipos' => $tipos,
      'titulo' => $titulo]);
    }
    public function getPropiedadesTipo(Request $request){
      $titulo="Lista de propiedades";
        if($request->input('tipo')==0){
          return redirect()
          ->route('prop.index');
        }
        $tipo=Tipo::find($request->input('tipo'));
        $titulo=$titulo.": ".  $tipo->nombre;
      $propiedades = Propiedad::where('tipo_id',$request->input('tipo'))->paginate(3);
        $tipos = Tipo::all();
      return view('propiedad.index',
      ['propiedades'=>  $propiedades,
      'tipos' => $tipos,
      'titulo' => $titulo]);
    }
    public function getAdminIndex(){
        $propiedades = Propiedad::
        orderBy('created_at', 'asc')->paginate(5);
        return view('admin.index', ['propiedades' => $propiedades]);
    }

    public function getPropiedad($id)
    {
        $prop = Propiedad::where('id', $id)->first();
        return view('propiedad.propiedad', ['prop' => $prop]);
    }

    public function getAdminCreate()
    {
        $rasgos = Rasgo::all();
        $tipos = Tipo::all();
        return view('admin.create', ['rasgos' => $rasgos,'tipos' => $tipos]);
    }

    public function getAdminEdit(Propiedad $prop)
    {
        $prop = Propiedad::find($prop->id);
        $rasgos = Rasgo::all();
        $tipos = Tipo::all();
        return view('admin.edit',
        ['prop' => $prop,
        'rasgos' => $rasgos,'tipos' => $tipos]);
    }

    public function PropAdminCreate( Request $request)
    {
      $this->validate($request, [
          'nombre' => 'required|min:3',
          'ubicacion' => 'required|min:5',
          'cantidadHabitaciones' => 'required|numeric|min:1|max:30',
          'cantidadCarros' => 'required|numeric|min:0|max:10'
      ]);
      $ruta=$request->file('imagenProp')->store(
                'propiedades','public'
              );
        $prop= new Propiedad([
            'nombre' => $request->input('nombre'),
            'ubicacion' => $request->input('ubicacion'),
            'cantidadHabitaciones' => $request->input('cantidadHabitaciones'),
            'cantidadCarros' => $request->input('cantidadCarros'),
            'imagen'=>$ruta
        ]);
        $user=Auth::user();
        $prop->user()->associate($user);

        $tipo= Tipo::find($request->input('tipo'));
        $prop->tipo()->associate($tipo);
          $prop->save();
        $prop->Rasgos()->
        attach($request->input('rasgos') === null ? [] :
           $request->input('rasgos'));
        return redirect()
        ->route('admin.index')
        ->with('info', 'Propiedad: ' . $request->input('nombre').' creado');
    }

    public function PropAdminUpdate(Propiedad $prop,Request $request)
    {
      $this->validate($request, [
          'nombre' => 'required|min:3',
          'ubicacion' => 'required|min:5',
          'cantidadHabitaciones' => 'required|numeric|min:0|max:20',
          'cantidadCarros' => 'required|numeric|min:0|max:20'
      ]);
        $prop = Propiedad::find($request->input('id'));
        if(!($request->file('imagenProp')===null)
      || !($request->file('imagenProp')=="")){
        Storage::disk('public')->delete($prop->imagen);
        //Subir la Imagen
        $ruta=$request->file('imagenProp')->store(
          'propiedades','public'
        );
        $prop->imagen=$ruta;
      }
        $prop->nombre = $request->input('nombre');
        $prop->ubicacion = $request->input('ubicacion');
        $prop->cantidadHabitaciones = $request->input('cantidadHabitaciones');
        $prop->cantidadCarros = $request->input('cantidadCarros');
        $tipo= Tipo::find($request->input('tipo'));
        $prop->tipo()->associate($tipo);
          $prop->save();
        $prop->Rasgos()->sync(
          $request->input('rasgos')
          === null ? [] : $request->input('rasgos'));
        return redirect()
        ->route('admin.index')
        ->with('info', 'Propiedad: ' . $request->input('nombre').' editado');
    }
    public function grafico()
  {
    $chart = new Graficos();

      $titulo="Promedio de Cantidad de Habitaciones por Tipo de Propiedad";
      $propiedades =Propiedad::select(DB::raw("avg(cantidadHabitaciones) as promedio") ,
    DB::raw("tipo_id"))
    ->orderBy('nombre')
    ->groupby(DB::raw("tipo_id"))
    ->with('tipo')
    ->get();
    $etiquetas=[];
    foreach($propiedades as $prop){
      $etiquetas[]=$prop->tipo->nombre;
    }
$cantidades=$propiedades->pluck('promedio');

      //labels
      $chart->labels($etiquetas);

    $dataset=$chart->dataset($titulo, 'pie',$cantidades);
    $dataset->backgroundColor(['#a9cce3', ' #a9dfbf', '#fad7a0','#c39bd3','#f9e79f','#a3e4d7', '#fadbd8', '#e59866']);
    $dataset->color(['#2980b9', '#52be80', '#f0b27a','#7d3c98', '#f4d03f','#48c9b0','#f1948a','#d35400']);

    return view('admin.grafico', ['chart' => $chart]);

  }
  public function descargarPDF(){
  $props= Propiedad::orderBy('nombre', 'desc');
    if(Gate::denies('ver-todas-propiedades')){
          $props=$props->where('user_id',auth()->user()->id);
        }
    $props=$props->get();
    $pdf=PDF::loadView('helado.reportePDF',compact('props'));
    return $pdf->download('reportePDF-'.time().'.pdf');

  }
}
