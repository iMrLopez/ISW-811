<?php

use Illuminate\Database\Seeder;

class CaracteristicaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $caracteristica= new \App\Caracteristica();
      $caracteristica->nombre = 'Lácteo';
      $caracteristica->save();
      $caracteristica= new \App\Caracteristica();
      $caracteristica->nombre = 'Libre de Gluten';
      $caracteristica->save();
      $caracteristica= new \App\Caracteristica();
      $caracteristica->nombre = 'Libre de Lácteos';
      $caracteristica->save();
      $caracteristica= new \App\Caracteristica();
      $caracteristica->nombre = 'Libre de azúcar añadida';
      $caracteristica->save();
      $caracteristica= new \App\Caracteristica();
      $caracteristica->nombre = 'Artesanal';
      $caracteristica->save();
      $caracteristica= new \App\Caracteristica();
      $caracteristica->nombre = 'Base de agua';

    }
}
