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
        'name' => "Administrador Principal",
        'email' => "correo@admin.com",
        'address' => "Direccion xyz",
        'telephone' => "+5060000000",
        'status' => "Activo",
        'role' => "Administrador",
      ]);
      DB::table('user_master')->insert([
        'uname' => "admincentro",
        'password' => bcrypt("admincentro"),
        'name' => "Administrador Centro Recoleccion",
        'email' => "correo@admin.com",
        'address' => "Direccion xyz",
        'telephone' => "+5060000000",
        'status' => "Activo",
        'role' => "Centro Recoleccion",
      ]);
      DB::table('user_master')->insert([
        'uname' => "cliente1",
        'password' => bcrypt("cliente1"),
        'name' => "cliente1",
        'email' => "correo@cliente1.com",
        'address' => "Direccion xyz",
        'telephone' => "+5060000000",
        'status' => "Activo",
        'role' => "Cliente",
      ]);
    
    }
}
