<?php

namespace App\Http\Controllers;

use App\Videojuego;
use App\Like;
use App\Plataforma;
use Auth;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideojuegoController extends Controller
{
    public function getIndex(){

        $listado=Videojuego::where('publicar',true)->
        orderBy('created_at','desc')->paginate(2);
        return view('videojuego.index',
        ['videojuegos'=>$listado]);
    }
    public function getVideojuego($id){

      $videojuego=Videojuego::where('id',$id)->with('likes')->first();
      return view('videojuego.videojuego',
      ['vj'=>$videojuego]);
    }
    public function getLikeVideojuego($id){

      $videojuego=Videojuego::where('id',$id)->first();
      $like=new Like();

      $videojuego->likes()->save($like);
      return redirect()->back();
    }

    public function getAdminIndex(){

        $listado=Videojuego::orderBy('nombre','asc');
        if(Gate::denies('see-all-vj')){
          $listado=$listado->where('user_id',auth()->user()->id);
        }
        $listado=$listado->paginate(3);
        return view('admin.index',
        ['videojuegos'=>$listado]);
    }
    public function getAdminEdit(Videojuego $vj){
      $plataformas=Plataforma::all();

      $videojuego=Videojuego::find($vj->id);
      return view('admin.edit',
      ['vj'=>$videojuego,
      'plataformas'=>$plataformas]);
    }
    public function getAdminCreate(){
      $plataformas=Plataforma::all();
      return view('admin.create',['plataformas'=>$plataformas]);
    }
    public function vjAdminCreate( Request $request)
    {
      $this->validate($request, [
          'nombre' => 'required|min:5',
          'descripcion' => 'required|min:10',
          'fechaEstrenoInicial' => 'required|date',
          'archivoImagen'=>'required|image'
      ]);
      /*  $Videojuego = new Videojuego();
        $Videojuego->addVideojuego($session,
        $request->input('nombre'),
        $request->input('descripcion'),
        $request->input('fechaEstrenoInicial'));*/
        //Subir la Imagen
        $ruta=$request->file('archivoImagen')->store(
          'images','public'
        );

        $vj=new Videojuego([
            'nombre'=>  $request->input('nombre'),
            'descripcion'=> $request->input('descripcion'),
            'fechaEstrenoInicial'=> $request->input('fechaEstrenoInicial'),
            'imagen'=>$ruta
        ]);
        $user=Auth::user();
        $vj->user()->associate($user);

        $vj->save();
        $vj->plataformas()->
        attach($request->input('plataformas')=== null ? []:
         $request->input('plataformas'));
        return redirect()
        ->route('admin.index')
        ->with('info', 'Videojuego: ' . $request->input('nombre').' creado');
    }
    public function vjAdminUpdate(Videojuego $vj, Request $request)
    {
        $this->validate($request, [
          'nombre' => 'required|min:5',
          'descripcion' => 'required|min:10',
          'fechaEstrenoInicial' => 'required|date'
      ]);
      /*  $Videojuego = new Videojuego();
        $Videojuego->editVideojuego($session,
        $request->input('id'), $request->input('nombre'),
        $request->input('descripcion'),
        $request->input('fechaEstrenoInicial'));*/
        $vj=Videojuego::find($request->input('id'));
        if(!($request->file('archivoImagen')===null)
        || !($request->file('archivoImagen')=="")){
          Storage::disk('public')->delete($vj->imagen);
          //Subir la Imagen
          $ruta=$request->file('archivoImagen')->store(
            'images','public'
          );
          $vj->imagen=$ruta;
        }
        $vj->nombre=$request->input('nombre');
        $vj->descripcion=$request->input('descripcion');
        $vj->fechaEstrenoInicial=$request->input('fechaEstrenoInicial');
        $vj->save();

        $vj->plataformas()->
        sync($request->input('plataformas')=== null ? []:
         $request->input('plataformas'));

        return redirect()
        ->route('admin.index')
        ->with('info', 'Videojuego: ' . $request->input('nombre').' editado');
    }
    public function publicar(Videojuego $vj ){
      $vj->publicar=true;
      $vj->save();
      return back();
    }

}
