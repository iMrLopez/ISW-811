<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('transactionAmmount',8,2);
            $table->string('transactionDescription');
            $table->enum('transactionType',['Credito','Debito']);
            $table->unsignedInteger('walletId')->references('clientId')->on('wallet_master');
            $table->unsignedInteger('collectionCenterId')->references('id')->on('collectioncenter_master');
          //  $table->dateTime('transactionDate');
            $table->decimal('walletOldBalance',8,2);
            $table->decimal('walletNewBalance',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_detail');
    }
}
