<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropiedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedads', function (Blueprint $table) {
           $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 100);
            $table->text('ubicacion');
            $table->tinyInteger('cantidadHabitaciones');
            $table->tinyInteger('cantidadCarros');
            $table->integer('tipo_id')->unsigned();
            $table->timestamps();
            $table->foreign('tipo_id')->
            references('id')->
            on('tipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('propiedads', function (Blueprint $table) {
          $table->dropForeign('propiedads_tipo_id_foreign');

          $table->dropColumn('tipo_id');

      });
        Schema::dropIfExists('propiedads');
    }
}
