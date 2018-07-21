<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uname')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('telephone');
            $table->enum('status',['Activo','Inactivo']);
            $table->enum('role',['admin','collection','client'])->default('client');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
