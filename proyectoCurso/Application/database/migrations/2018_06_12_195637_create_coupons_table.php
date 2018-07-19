<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_master', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name',60);
          $table->string('description',250);
          $table->float('CRCValue',8,2);
          $table->enum('status',['Activo','Inactivo']);
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
        Schema::dropIfExists('coupon_master');
    }
}
