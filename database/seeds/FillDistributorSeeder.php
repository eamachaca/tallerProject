<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FillDistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create('es-MX');
        for ($i=0;$i<200;$i++) {
            try {
                \App\FillDistributor::create([
                    'quantity' => $faker->numberBetween(0,10),
                    'entry' => $faker->boolean,
                    'product_id'=> \App\Product::all()->random()->id,
                    'distributor_id'=>\App\Distributor::all()->random()->id
                ]);
            } catch (\Exception $e) {
                $i -= 5;
            }
        }
    }
}
