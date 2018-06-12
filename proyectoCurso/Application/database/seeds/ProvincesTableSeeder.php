<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('province_master')->insert([
        'name' => "San Jose",
      ]);
      DB::table('province_master')->insert([
        'name' => "Alajuela",
      ]);
      DB::table('province_master')->insert([
        'name' => "Cartago",
      ]);
      DB::table('province_master')->insert([
        'name' => "Heredia",
      ]);
      DB::table('province_master')->insert([
        'name' => "Guanacaste",
      ]);
      DB::table('province_master')->insert([
        'name' => "Puntarenas",
      ]);
      DB::table('province_master')->insert([
        'name' => "Limon",
      ]);
    }
}
