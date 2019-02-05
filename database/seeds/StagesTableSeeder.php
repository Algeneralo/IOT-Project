<?php

use Illuminate\Database\Seeder;

class StagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($counter = 0; $counter < 20; $counter++) {
            DB::table('stages')->insert([
                "profile_id" => $faker->numberBetween(1, 10),
                "name" => $faker->firstName . " Stage",
                "temp" => $faker->randomFloat(2, '20', '70'),
                "time" => $faker->numberBetween(10000,11111111111),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
