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
            $table->unsignedInteger('provinceId')->references('id')->on('province_master');
            $table->string('address');
            $table->string('description');
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
        Schema::dropIfExists('collection_center');
    }
}
