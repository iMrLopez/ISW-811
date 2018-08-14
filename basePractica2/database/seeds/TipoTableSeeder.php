<?php

use Illuminate\Database\Seeder;

class TipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipo= new \App\Tipo();
        $tipo->nombre = 'Venta';
        $tipo->save();

        $tipo= new \App\Tipo();
        $tipo->nombre = 'Alquiler';
        $tipo->save();
        
        $tipo= new \App\Tipo();
        $tipo->nombre = 'Comercial';
        $tipo->save();
    }
}
