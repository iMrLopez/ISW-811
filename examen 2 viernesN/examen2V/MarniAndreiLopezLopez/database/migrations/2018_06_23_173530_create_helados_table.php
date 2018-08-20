<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->text('detalle');
            $table->integer('precioUnitario');
            $table->text('imagen');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->
            references('id')->
            on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('Helados', function (Blueprint $table) {
        $table->dropForeign('Helados_user_id_foreign');

        $table->dropColumn('user_id');

    });
        Schema::dropIfExists('Helados');
    }
}
