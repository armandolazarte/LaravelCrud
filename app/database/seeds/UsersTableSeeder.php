<?php

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 60; $i++) {
            DB::table('users')->insert(array(
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->email,
                'password' => Hash::make('123456'),
                'active' => rand(0, 1),
                'type' => 'user',
            ));
        }
    }
}
