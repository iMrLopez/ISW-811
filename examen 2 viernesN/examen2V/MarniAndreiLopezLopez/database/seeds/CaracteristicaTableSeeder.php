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
      $caracteristica->detalle = 'Incluye Lácteos';
      $caracteristica->save();
      $caracteristica= new \App\Caracteristica();
      $caracteristica->nombre = 'Libre de Gluten';
      $caracteristica->detalle = 'No incluye gluten';
      $caracteristica->save();
      $caracteristica= new \App\Caracteristica();
      $caracteristica->nombre = 'Libre de Lácteos';
      $caracteristica->detalle = 'No incluye lácteos';
      $caracteristica->save();
      $caracteristica= new \App\Caracteristica();
      $caracteristica->nombre = 'Libre de azúcar añadida';
      $caracteristica->detalle = 'No incluye azúcar añadida';
      $caracteristica->save();
      $caracteristica= new \App\Caracteristica();
      $caracteristica->nombre = 'Artesanal';
      $caracteristica->detalle = 'Elaboración artesanal';
      $caracteristica->save();
      $caracteristica= new \App\Caracteristica();
      $caracteristica->nombre = 'Base de agua';
      $caracteristica->detalle = 'Elaboración con base de agua';

    }
}
