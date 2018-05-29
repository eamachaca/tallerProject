<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0;$i<30;$i++) {
            \App\Order::create([
                'client_name' => $faker->name,
                'client_phone' => $faker->randomNumber(8,true),
                'lat'   =>  $faker->latitude,
                'lng'   =>  $faker->longitude,
                'total_price'=>$faker->randomFloat(2,10,60000)
            ]);
        }

    }
}