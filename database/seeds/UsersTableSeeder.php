<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
            DB::table('users')->insert([
                'name' => $faker->name,
                'password' => Hash::make('123'),
                'iot_id' => $faker->unique()->numberBetween(1000000000, 9999999999),
                'email' => $faker->email,
                'email_verified_at' => $counter % 2 == 1 ? null : Carbon::now(),
                'isPremium' => $faker->numberBetween(0, 1),
                'p_date' => null,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
    }
}
