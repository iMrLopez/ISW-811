<?php

namespace App\Http\Controllers;

use App\User_Master;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User_Master::orderBy('id','ASC')->paginate(10);
        return view('app.users.index')->with('data',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('app.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $user = new User_Master($request->all());
      $user->password = bcrypt($request->password);
      $user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User_Master  $user_Master
     * @return \Illuminate\Http\Response
     */
    public function show(User_Master $user_Master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User_Master  $user_Master
     * @return \Illuminate\Http\Response
     */
    public function edit(User_Master $user_Master)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User_Master  $user_Master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_Master $user_Master)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User_Master  $user_Master
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Master $user_Master)
    {
        //
    }
}
