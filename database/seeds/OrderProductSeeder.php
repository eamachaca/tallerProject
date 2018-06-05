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
        $faker=Faker::create('es-MX');
        for ($i=0;$i<600;$i++) {
            try {
                \App\OrderProduct::create([
                    'product_id' => \App\Product::all()->random()->id,
                    'order_id' => \App\Order::all()->random()->id,
                    'partial_price' => $faker->randomFloat(2, 6, 1000),
                    'quantity' => $faker->randomNumber(2, true),
                ]);
            } catch (\Exception $e) {
                    $i -= 5;
                echo '-5';
            }
        }
    }
}
