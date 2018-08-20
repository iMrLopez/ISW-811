<?php

namespace App\Http\Controllers;
use App\Caracteristica;

use Illuminate\Http\Request;


class CaracteristicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $caracteristica = Caracteristica::orderBy('nombre', 'desc')->paginate(10);
      return view('caracteristica.index',['caracteristica'=>$caracteristica]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $Caracteristica = Caracteristica::find ($request->id);
      $Caracteristica->nombre = $request->nombre;
      $Caracteristica->detalle = $request->detalle;
      $Caracteristica->save();
      return response()->json($Caracteristica);
    }

}
