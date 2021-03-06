<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallet_detail extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'wallet_detail';
    protected $fillable = ['collectionCenterId','walletId','transactionAmmount','transactionDescription','transactionType','walletOldBalance','walletNewBalance'];

    public function wallet_master(){
      return $this->belongsTo('App\wallet_master');
    }


}
