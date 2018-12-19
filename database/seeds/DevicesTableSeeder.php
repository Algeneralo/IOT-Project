<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Device($faker));
        for ($counter = 0; $counter < 20; $counter++) {
            DB::table('devices')->insert([
                'user_id' => rand(1, 10),
                'name' => $faker->firstName . "'s " . $faker->deviceManufacturer,
                'mac_address' => $faker->macAddress,
                'type' => 'ftss',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
