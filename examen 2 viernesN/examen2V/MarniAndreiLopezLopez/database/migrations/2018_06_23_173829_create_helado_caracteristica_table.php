<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeladoCaracteristicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helado_caracteristica', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->integer('helado_id')->unsigned();
          $table->integer('caracteristica_id')->unsigned();
          $table->foreign('helado_id')->references('id')->on('helados')->onDelete('cascade');
          $table->foreign('caracteristica_id')->references('id')->on('caracteristicas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('helado_caracteristica', function (Blueprint $table) {
      $table->dropForeign('helado_caracteristica_helado_id_foreign');
      $table->dropColumn('helado_id');
      $table->dropForeign('helado_caracteristica_caracteristica_id_foreign');
      $table->dropColumn('caracteristica_id');
      });
        Schema::dropIfExists('helado_caracteristica');
    }
}
