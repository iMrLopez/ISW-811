<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionCenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collectionCenter_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('provinceId')->references('id')->on('province_master');
            $table->string('address');
            $table->enum('status',['Activo','Inactivo']);
            $table->unsignedInteger('mgmUserId')->references('id')->on('user_master');
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
        Schema::dropIfExists('collection_center');
    }
}
