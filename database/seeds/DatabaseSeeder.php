<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ZoneSeeder::class);
        $this->call(TypeProductSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(DistributorSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(OrderProductSeeder::class);
        $this->call(FillDistributorSeeder::class);
    }
}
