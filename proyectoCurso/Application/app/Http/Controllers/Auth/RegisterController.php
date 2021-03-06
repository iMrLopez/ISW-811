<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\wallet_master;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/appEco';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

      $wallet_master = new wallet_master([
        //'clientId' =>$data['username'],
        'redeemedBalance' => 0,
        'actualBalance' => 0,
        'totalBalance' => 0,
      ]);


      $User = User::create([
          'username' => $data['username'],
          'name' => $data['name'],
          'address' => $data['address'],
          'telephone' => $data['telephone'],
          'status' => $data['status'],
          'email' => $data['email'],
          'role' => $data['role'],
          'password' => Hash::make($data['password']),
          'wallet_master' =>$wallet_master
      ]);

      $User->wallet_master()->save($wallet_master);

      return $User;
    }
}
