<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votos', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('puntos')->unsigned();
          $table->integer('helado_id')->unsigned();
          $table->timestamps();
          $table->foreign('helado_id')->
          references('id')->
          on('helados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('votos', function (Blueprint $table) {
          $table->dropForeign('votos_helado_id_foreign');

          $table->dropColumn('helado_id');

      });
        Schema::dropIfExists('votos');
    }
}
