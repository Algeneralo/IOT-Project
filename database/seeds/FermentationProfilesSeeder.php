<?php

use Illuminate\Database\Seeder;

class FermentationProfilesSeeder extends Seeder
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
            DB::table('fermentation_profiles')->insert([
                "user_id" => "1",
                "name" => $faker->firstName,
                "type" => $faker->numberBetween(1, 5),
                "duration" => $faker->numberBetween(1, 20) . " days",
                "fahrenheit" => $faker->numberBetween(0, 1),
                "notes" => $faker->text,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
