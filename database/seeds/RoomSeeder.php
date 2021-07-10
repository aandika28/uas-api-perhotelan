<?php

use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
   //seeder data
    public function run()
    {
            DB::table('rooms')->insert([
            [
           "name"          => "melati",
            "price"        => "100000",
            "floor"         => 1,
            "location"      => "gedung melati",
            "type_id"      => 1,
            ],
            [
            "name"          => "lily",
            "price"        => "300000",
            "floor"         => 2,
            "location"      => "gedung lily",
            "type_id"      => 2,
            ]
        ]);
    }
}
