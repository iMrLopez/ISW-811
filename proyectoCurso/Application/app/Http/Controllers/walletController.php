<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Material_master;

class walletController extends Controller
{
    //
    public function startRedeemMaterials(){
      return view('app.CRUD.walletDetail.redeemMaterials',['data' => Material_master::all()]);
    }
    public function doRedeemMaterials(Request $request){

      $lines = $request->input('wallet_detail');





      dd($lines);
    }
}
