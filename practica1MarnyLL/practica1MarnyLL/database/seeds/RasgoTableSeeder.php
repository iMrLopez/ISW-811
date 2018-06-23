<?php

use Illuminate\Database\Seeder;

class RasgoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rasgo= new \App\Rasgo();
        $rasgo->nombre = 'Acceso Restringido';
        $rasgo->save();

        $rasgo= new \App\Rasgo();
        $rasgo->nombre = 'Calle sin salida';
        $rasgo->save();

        $rasgo= new \App\Rasgo();
        $rasgo->nombre = 'Comunidad Privada';
        $rasgo->save();

        $rasgo= new \App\Rasgo();
        $rasgo->nombre = 'Cuarto de Servicio';
        $rasgo->save();

        $rasgo= new \App\Rasgo();
        $rasgo->nombre = 'Oficina';
        $rasgo->save();

        $rasgo= new \App\Rasgo();
        $rasgo->nombre = 'Sobre de granito';
        $rasgo->save();

        $rasgo= new \App\Rasgo();
        $rasgo->nombre = 'Vista';
        $rasgo->save();

        $rasgo= new \App\Rasgo();
        $rasgo->nombre = 'Piscina';
        $rasgo->save();

        $rasgo= new \App\Rasgo();
        $rasgo->nombre = 'Amueblado';
        $rasgo->save();

        $rasgo= new \App\Rasgo();
        $rasgo->nombre = 'Chimenea';
        $rasgo->save();
    }
}
