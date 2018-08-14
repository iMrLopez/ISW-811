<?php

namespace App\Http\Controllers;

use App\Propiedad;
use App\Tipo;
use App\Rasgo;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    public function getIndex(){
      $titulo="Lista de propiedades";
        $tipos = Tipo::all();
      $propiedades = Propiedad::orderBy('nombre', 'desc')->get();
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
      $propiedades = Propiedad::where('tipo_id',$request->input('tipo'))->get();
        $tipos = Tipo::all();
      return view('propiedad.index',
      ['propiedades'=>  $propiedades,
      'tipos' => $tipos,
      'titulo' => $titulo]);
    }
    public function getAdminIndex()
    {
        $propiedades = Propiedad::
        orderBy('created_at', 'asc')->get();
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

    public function getAdminEdit(Propiedad $propiedad)
    {
        $prop = Propiedad::find($propiedad->id);
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

        $prop= new Propiedad([
            'nombre' => $request->input('nombre'),
            'ubicacion' => $request->input('ubicacion'),
            'cantidadHabitaciones' => $request->input('cantidadHabitaciones'),
            'cantidadCarros' => $request->input('cantidadCarros'),

        ]);

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



      return view('admin.grafico');

    }
  public function descargarPDF(){


  }
}
