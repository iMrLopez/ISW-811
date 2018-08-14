<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Product_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->string('description');
            $table->longText('img');
            $table->decimal('cost',8,2);
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
        Schema::dropIfExists('Product_master');
    }
}
