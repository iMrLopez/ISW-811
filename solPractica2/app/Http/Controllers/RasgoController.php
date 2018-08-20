<?php

namespace App\Http\Controllers;
use App\Rasgo;
use Validator;
use Response;
use JavaScript;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RasgoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $rasgo = Rasgo::orderBy('nombre', 'desc')->paginate(10);
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
      $rules = array(
          'nombre' => 'required'
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }
      else {
        $Rasgo = new Rasgo;
        $Rasgo->nombre = $request->nombre;
        $Rasgo->save();
        return response()->json($Rasgo);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $Rasgo = Rasgo::find ($request->id);
      $Rasgo->nombre = $request->nombre;
      $Rasgo->save();
      return response()->json($Rasgo);
    }

}
