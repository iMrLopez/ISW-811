<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropiedadRasgoTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('propiedad_rasgo', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->integer('propiedad_id')->unsigned();
          $table->integer('rasgo_id')->unsigned();
          $table->foreign('propiedad_id')->
          references('id')->
          on('propiedads')->onDelete('cascade');
          $table->foreign('rasgo_id')->
          references('id')->
          on('rasgos')->onDelete('cascade');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('propiedad_rasgo', function (Blueprint $table) {
        $table->dropForeign('propiedad_rasgo_propiedad_id_foreign');
        $table->dropColumn('propiedad_id');
        $table->dropForeign('propiedad_rasgo_rasgo_id_foreign');
        $table->dropColumn('rasgo_id');

    });
      Schema::dropIfExists('propiedad_rasgo');
  }
}
