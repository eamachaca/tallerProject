<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create('es-MX');
        \App\User::create([
            'name' => $faker->name,
            'username' => 'admin',
            'password'=> bcrypt('secret'),
        ]);
        \App\User::create([
            'name' => $faker->name,
            'username' => 'user',
            'password'=> bcrypt('admin'),
        ]);
    }
}
