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
        $faker=Faker::create('es-MX');
        $lat=-17.7868414;
        $lng=-63.1967916;
        $date=\Carbon\Carbon::today();
        for ($i=0;$i<80;$i++) {
            \App\Order::create([
                'client_name' => $faker->name,
                'client_phone' => 70000000+$faker->randomNumber(7,true),
                'lat'   =>  $lat+$faker->randomFloat(8,-0.09,0.09),
                'lng'   =>  $lng+$faker->randomFloat(8,-0.09,0.09),
                'total_price'=>$faker->randomFloat(2,10,60000),
                'address'=>$faker->address,
                'delivery_date'=>$date->addDays($faker->numberBetween(0,3)),
                'zone_id'=>\App\Zone::all()->random()->id,
            ]);
        }

    }
}