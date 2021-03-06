<?php

use Illuminate\Database\Seeder;

class CollectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return vousername
     */
    public function run(){
      DB::table('collectionCenter_master')->insert([
        'name' => "Colegio San Juan Norte",
        'address' => "De la cruz roja 1 kilometro al norte",
        'status' => "Activo",
        'province_master_id' => '1'
      ]);
      DB::table('collectionCenter_master')->insert([
        'name' => "Colegio Tecnico Juan Norte",
        'address' => "491 Concord Street North Carolina",
        'status' => "Inactivo",
        'province_master_id' => '2'
      ]);
      DB::table('collectionCenter_master')->insert([
        'name' => "Parque San Juan Norte",
        'address' => "39 Emma Street",
        'status' => "Activo",
        'province_master_id' => '4'
      ]);
      DB::table('collectionCenter_master')->insert([
        'name' => "Compactadora San Juan Norte",
        'address' => "2423 Nelm Street",
        'status' => "Activo",
        'province_master_id' => '5'
      ]);
    }
}
