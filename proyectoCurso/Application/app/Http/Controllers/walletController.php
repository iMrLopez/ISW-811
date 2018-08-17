<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Material_master;
use App\collectionCenter_master;
use App\wallet_master;
use App\wallet_detail;
use App\Product_master;

class walletController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

  //This method gets the status of the wallet for the actually signed in user
  public function doGetWalletStatus(){
    $detail = wallet_detail::where('walletId',Auth::user()->username)->orderBy('id','desc')->paginate(10);
    return view('app.wallet.index',['detail'=> $detail]);
  }

  //Redeem Materials (Credit to the wallet) (get)
  public function startRedeemMaterials(){
    //TODO recordar que un usuario puede tener varios centros de acopio
    if(Auth::user()->collectionCenter->id == 0 || Auth::user()->collectionCenter->status == 'Inactivo'){
      $msg = array('type'=>'error','title'=>'Centro de acopio desactivado','contents'=>'Proceso no realizado, el centro de acopio se encuentra bloqueado');
      return redirect()->route('app.appEco')->with('msg', $msg);
    }else{
      return view('app.CRUD.walletDetail.redeemMaterials',['data' => Material_master::all()]);
    }

  }

  //Redeem Materials (Credit to the wallet) (post)
  public function doConvertMaterials(Request $request){

    foreach($request->input('wallet_detail') as $item){
      if($item['transactionAmmount'] != '0'){
        $wallet_master = wallet_master::find($request->input('wallet_master')['id']);

        $model = new wallet_detail([
          'transactionAmmount'=>$item['transactionAmmount'],
          'transactionDescription'=>$item['transactionDescription'],
          'transactionType'=>$item['transactionType'],
          'walletId'=>$wallet_master->clientId,
          'collectionCenterId'=>$request->input('collectionCenter_master')['id'],
          'walletOldBalance'=>$wallet_master->actualBalance,
          'walletNewBalance'=>$wallet_master->actualBalance + $item['transactionAmmount']
        ]);
        $wallet_master->actualBalance = $wallet_master->actualBalance + $item['transactionAmmount']; //Save the new balance on the wallet
        $wallet_master->totalBalance = $wallet_master->totalBalance + $item['transactionAmmount']; //Save the total ammount for the historic shown to the user
        $wallet_master->save(); //save the wallet master
        $model->save(); //save the wallet detail
      }
    }
    $msg = array('type'=>'success','title'=>'Proceso realizado','contents'=>'Se han agregado los materiales a la billetera del cliente');
    return redirect()->route('app.appEco')->with('msg', $msg);


  }

  //Create a new coupon (get)
  public function startCreateCoupon(){
    return view('app.CRUD.walletDetail.redeemProducts',['data'=>Product_master::where('status','Activo')->get()]);
  }

  //Create a new coupon (post)
  public function doCreateCoupon(Request $request){

    foreach($request->input('wallet_detail') as $item){
      if($item['transactionAmmount'] != '0'){
        $wallet_master = wallet_master::find($request->input('clientId'));

        $model = new wallet_detail([
          'transactionAmmount'=>$item['transactionAmmount'],
          'transactionDescription'=>$item['transactionDescription'],
          'transactionType'=>$item['transactionType'],
          'walletId'=>$wallet_master->clientId,
          'walletOldBalance'=>$wallet_master->actualBalance,
          'walletNewBalance'=>$wallet_master->actualBalance - $item['transactionAmmount']
        ]);
        $wallet_master->actualBalance = $wallet_master->actualBalance - $item['transactionAmmount']; //Save the new balance on the wallet
        $wallet_master->redeemedBalance = $wallet_master->redeemedBalance + $item['transactionAmmount']; //Save the total redeemedBalance for the historic shown to the user
        $wallet_master->save(); //save the wallet master
        $model->save(); //save the wallet detail
      }
    }
    $msg = array('type'=>'success','title'=>'Proceso realizado','contents'=>'Se han generado los cupones!');
    return redirect()->route('client.coupon.getActiveCoupons')->with('msg', $msg);

  }

  //Get all active coupons for this user (get)
  public function getActiveCoupons(){ //TODO generate a QR 
    $data = wallet_detail::where([['status','Activo'],['transactionType','Debito'],['walletId',Auth::user()->id]])->get();
    return view('app.CRUD.walletDetail.activeCoupons',['data'=>$data]);
  }


}
