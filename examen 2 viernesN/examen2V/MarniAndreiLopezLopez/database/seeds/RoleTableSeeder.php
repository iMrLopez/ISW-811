<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $administrador = \App\Role::create([
      'nombre'        => 'administrador',
      'permissions' => json_encode([
          'crear-h' => true
      ]),
  ]);

  $cajero = \App\Role::create([
      'nombre'        => 'cajero',
      'permissions' => json_encode([
          'crear-h'  => true
      ]),
  ]);
    }
}
