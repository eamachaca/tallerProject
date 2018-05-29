<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0;$i<400;$i++) {
            try {
                \App\OrderProduct::create([
                    'product_id' => \App\Product::all()->random()->id,
                    'order_id' => \App\Order::all()->random()->id,
                    'partial_price' => $faker->randomFloat(2, 6, 115640),
                    'quantity' => $faker->randomNumber(2,true),
                ]);
            }catch (\Exception $e){
                $i-=2;
            }
    }
    }
}
