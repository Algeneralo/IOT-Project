<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MtqqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($counter = 0; $counter < 10; $counter++) {
            DB::table('mqtt')->insert([
                'user_id' => $faker->unique()->numberBetween(1, 10),
                'user' => "fsoyuhgt",
                'password' => "4RGUx0JxSbDn",
                'ip' => "m15.cloudmqtt.com",
                'port' => 32060,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
