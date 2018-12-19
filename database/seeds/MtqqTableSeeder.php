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
                'user' => $faker->userName,
                'password' => $faker->password,
                'ip' => $faker->ipv4,
                'port' => mt_rand(10, 100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
