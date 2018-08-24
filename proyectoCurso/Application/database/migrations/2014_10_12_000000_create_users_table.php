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
    Schema::create('users', function (Blueprint $table) {

      $table->increments('id');
      $table->string('username')->unique();
      $table->string('password');
      $table->string('name');
      $table->string('email')->default('NULL');
      $table->string('address')->default('NULL');
      $table->string('telephone')->default('NULL');
      $table->enum('status',['Activo','Inactivo'])->default('Activo');
      $table->enum('role',['Admin','Collection','Client','Cashier'])->default('Client');
      $table->unsignedInteger('collectionCenter_id')->references('id')->on('collectionCenter_master')->default('0');
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
