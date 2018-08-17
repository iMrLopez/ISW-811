<?php

use Illuminate\Database\Seeder;

class WalletDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return vousername
     */
    public function run(){
      DB::table('wallet_detail')->insert([
        'transactionAmmount' => '1600.00',
        'transactionDescription' => 'Cambio - Madera (4) x 400',
        'transactionType' => 'Credito',
        'walletId' => "116230677",
        'collectionCenterId' => '1',
        'walletOldBalance' => '2600',
        'walletNewBalance' => '4200',
        'created_at'=>'2018-08-17 19:59:45',
        'updated_at'=>'2018-08-17 19:59:45'
      ]);
        DB::table('wallet_detail')->insert([
          'transactionAmmount' => '1200.00',
          'transactionDescription' => 'Cambio - Plastico (4) x 300',
          'transactionType' => 'Credito',
          'walletId' => "116230677",
          'collectionCenterId' => '1',
          'walletOldBalance' => '1400',
          'walletNewBalance' => '2600',
          'created_at'=>'2018-08-17 19:59:45',
          'updated_at'=>'2018-08-17 19:59:45'
        ]);
          DB::table('wallet_detail')->insert([
            'transactionAmmount' => '1400.00',
            'transactionDescription' => 'Cambio - Metal (7) x 200',
            'transactionType' => 'Credito',
            'walletId' => "116230677",
            'collectionCenterId' => '1',
            'walletOldBalance' => '0',
            'walletNewBalance' => '1400',
            'created_at'=>'2018-08-17 19:59:45',
            'updated_at'=>'2018-08-17 19:59:45'
          ]);
    }
}
