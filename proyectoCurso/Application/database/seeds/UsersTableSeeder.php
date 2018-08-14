<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return vousername
     */
    public function run(){
      DB::table('users')->insert([
        'username' => "admin",
        'password' => bcrypt("admin"),
        'name' => "Administrador",
        'status' => "Activo",
        'role' => "Admin",
      ]);
      DB::table('users')->insert([
        'username' => "admincentro1",
        'password' => bcrypt("admincentro1"),
        'name' => "Centro 1",
        'status' => "Activo",
        'role' => "Collection",
        'collectionCenter_id'=>'1',
      ]);
      DB::table('users')->insert([
        'username' => "admincentro2",
        'password' => bcrypt("admincentro2"),
        'name' => "Centro 2",
        'status' => "Activo",
        'role' => "Collection",
        'collectionCenter_id'=>'2',
      ]);
      DB::table('users')->insert([
        'username' => "116230677",
        'password' => bcrypt("116230677"),
        'name' => "Marny Lopez",
        'status' => "Activo",
        'role' => "Client",
      ]);

    }
}
