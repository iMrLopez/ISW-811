<?php

use Illuminate\Database\Seeder;

class WalletMasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return vousername
     */
    public function run(){
      DB::table('wallet_master')->insert([
        'clientId' => "116230677",
        'redeemedBalance' => 0,
        'actualBalance' => 4200,
        'totalBalance' => 4200,
      ]);
    }
}
