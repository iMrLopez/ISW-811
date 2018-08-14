<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProvincesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CollectionTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(WalletMasterTableSeeder::class);
    }
}
