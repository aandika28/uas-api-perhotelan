<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
   //seeder data
    public function run()
    {
            DB::table('types')->insert([
            [
            "name"          => "standard room",
            "description"   => "untuk anda yang sendirian",
            "capacity"      => 1,
            "facility"      => "single bed",
            ],
            [
           "name"          => "deluxe room",
            "description"   => "untuk anda yang mempunyai pasangan",
            "capacity"      => 2,
            "facility"      => "double bed",
            ]
        ]);
    }
}
