<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return vouname
     */
    public function run(){
      DB::table('user_master')->insert([
        'uname' => "admin",
        'password' => bcrypt("admin"),
        'name' => "Administrador",
        'email' => "correo@admin.com",
        'address' => "Direccion xyz",
        'telephone' => "+5060000000",
        'status' => "Activo",
        'role' => "admin",
      ]);
      DB::table('user_master')->insert([
        'uname' => "admincentro1",
        'password' => bcrypt("admincentro"),
        'name' => "Centro 1",
        'email' => "correo@admin.com",
        'address' => "Direccion xyz",
        'telephone' => "+5060000000",
        'status' => "Activo",
        'role' => "collection",
      ]);
      DB::table('user_master')->insert([
        'uname' => "admincentro2",
        'password' => bcrypt("admincentro"),
        'name' => "Centro 1",
        'email' => "correo@admin.com",
        'address' => "Direccion xyz",
        'telephone' => "+5060000000",
        'status' => "Activo",
        'role' => "collection",
      ]);
      DB::table('user_master')->insert([
        'uname' => "cliente1",
        'password' => bcrypt("cliente1"),
        'name' => "Cliente 1",
        'email' => "correo@cliente1.com",
        'address' => "Direccion xyz",
        'telephone' => "+5060000000",
        'status' => "Activo",
        'role' => "client",
      ]);

    }
}
