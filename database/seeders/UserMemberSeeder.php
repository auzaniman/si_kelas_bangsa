<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class UserMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $data = new \App\Repositories\UserMemberRepository();

        $data->create([
          'name' => "zufar",
          'email' => "zufar@gmail.com",
          'password' => 'user_member',
          'address' => $faker->address,
          'phone_number' => $faker->phoneNumber
        ]);

        $data->create([
          'name' => "auzan",
          'email' => "auzan@gmail.com",
          'password' => 'user_member',
          'address' => $faker->address,
          'phone_number' => $faker->phoneNumber
        ]);
    }
}
