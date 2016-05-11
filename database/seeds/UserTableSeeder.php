<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\User as User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_PT');

        User::insert(array(
            'name' => "root",
            'email' => "root@greenhouse.com",
            'password' => bcrypt("root"),
            'remember_token' => str_random(10),
        ));

    }
    
}
