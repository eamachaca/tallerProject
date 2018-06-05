<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create('es-MX');
        for ($i=0;$i<15;$i++) {
            try {
                \App\Address::create([
                    'name' => $faker->streetName    ,
                    'lat' => $faker->latitude,
                    'lng'=> $faker->longitude,
                    'client_id'=>\App\Client::all()->random()->id,
                    'zone_id'=>\App\Zone::all()->random()->id,
                ]);
            } catch (\Exception $e) {
                $i -= 5;
            }
        }
    }
}
