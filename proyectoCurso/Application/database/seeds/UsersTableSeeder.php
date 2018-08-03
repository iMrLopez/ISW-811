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
        'password' => bcrypt("admincentro1"),
        'name' => "Centro 1",
        'email' => "correo@admin.com",
        'address' => "Direccion xyz",
        'telephone' => "+5060000000",
        'status' => "Activo",
        'role' => "collection",
      ]);
      DB::table('user_master')->insert([
        'uname' => "admincentro2",
        'password' => bcrypt("admincentro2"),
        'name' => "Centro 2",
        'email' => "correo@admin.com",
        'address' => "Direccion xyz",
        'telephone' => "+5060000000",
        'status' => "Inactivo",
        'role' => "collection",
      ]);
      DB::table('user_master')->insert([
        'uname' => "116230677",
        'password' => bcrypt("116230677"),
        'name' => "Marny Lopez",
        'email' => "marny.lopez@outlook.com",
        'address' => "Esta es mi direccion privada",
        'telephone' => "+506 60453526",
        'status' => "Activo",
        'role' => "client",
      ]);

    }
}
