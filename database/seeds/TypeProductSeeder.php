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
        $faker=Faker::create('es-MX');
        for ($i=0;$i<20;$i++) {
            \App\TypeProduct::create([
                'name' => $faker->name,
                'description' => $faker->text
            ]);
        }
    }
}
