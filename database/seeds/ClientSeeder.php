<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create('es-MX');
        for ($i=0;$i<5;$i++) {
            $name=$faker->name;
            try {
                \App\Client::create([
                    'name' => $name,
                    'username' => $faker->userName,
                    'password'=> bcrypt($name),
                ]);
            } catch (\Exception $e) {
                $i -= 5;
            }
        }
    }
}
