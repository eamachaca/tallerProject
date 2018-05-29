<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TypeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0;$i<20;$i++) {
            DB::table('type_products')->insert([
                'name' => $faker->name,
                'description' => $faker->text
            ]);
        }
    }
}
