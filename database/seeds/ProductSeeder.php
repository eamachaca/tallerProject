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
        $faker = Faker::create();
        for ($i=0;$i<70;$i++) {
            DB::table('products')->insert([
                'name' => $faker->country,
                'price'=>$faker->randomFloat(null,0,20),
                'type_product_id'=>\App\TypeProduct::all()->random()->id
            ]);
        }

    }
}
