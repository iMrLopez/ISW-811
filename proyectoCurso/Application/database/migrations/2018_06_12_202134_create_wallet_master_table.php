<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_master', function (Blueprint $table) {
            $table->string('clientId')->references('username')->on('users');
            $table->decimal('redeemedBalance',8,2);
            $table->decimal('actualBalance',8,2);
            $table->decimal('totalBalance',8,2);
        //    $table->dateTime('lastMovement');
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
        Schema::dropIfExists('wallet_master');
    }
}
