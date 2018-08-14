<?php

namespace App\Http\Controllers;
use App\Rasgo;

use Illuminate\Http\Request;


class RasgoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $rasgo = Rasgo::orderBy('nombre', 'desc')->get();
      return view('rasgo.index',['rasgo'=>$rasgo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

}
