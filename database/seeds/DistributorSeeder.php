<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DistributorSeeder extends Seeder
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
                \App\Distributor::create([
                    'name' => $name,
                    'username' => $faker->userName,
                    'password'=> bcrypt($name),
                    'zone_id'=>\App\Zone::all()->random()->id,
                ]);
            } catch (\Exception $e) {
                $i -= 1;
            }
        }
    }
}
