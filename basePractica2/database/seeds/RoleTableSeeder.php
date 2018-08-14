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
      'name'        => 'administrador',
      'permissions' => json_encode([
          'crear-prop' => true,
          'grafico-prop'  => true,
          'pdf-prop' => true
      ]),
  ]);

  $agente = \App\Role::create([
      'name'        => 'agente',
      'permissions' => json_encode([
          'crear-prop'  => false,
          'pdf-prop' => true,
          'grafico-prop'=>true
      ]),
  ]);
    }
}
