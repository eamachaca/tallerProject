<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ZoneSeeder extends Seeder
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
                \App\Zone::create([
                    'name' => $faker->streetName    ,
                    'geo_json' => json_encode($faker->randomElements()),
                ]);
            } catch (\Exception $e) {
                $i -= 5;
            }
        }
    }
}
