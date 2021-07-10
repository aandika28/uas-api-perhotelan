<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   //memanggil seeder
    public function run()
    {
    $this->call([
        RoomSeeder::class,
        TypeSeeder::class,
      
    ]);
    }
}
