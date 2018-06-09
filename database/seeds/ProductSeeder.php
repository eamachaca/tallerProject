<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create('es-MX');
        for ($i=0;$i<800;$i++) {
            \App\Product::create([
                'name' => $faker->country,
                'price'=>$faker->randomFloat(2,2,50),
                'type_product_id'=>\App\TypeProduct::all()->random()->id,
                'quantity'=>$faker->numberBetween(1,100),
            ]);
        }

    }
}