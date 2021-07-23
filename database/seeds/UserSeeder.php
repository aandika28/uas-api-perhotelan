<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    //seeder data
    public function run()
    {
            DB::table('users')->insert([
            
            "name"          => "andika2",
            "email"         => "dika@gmail.com",
            "password"      => bcrypt('dika'),
            
        ]);
    }
}
