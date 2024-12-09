<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Factory::create();

        // Generate 10 dummy patients
        for ($i = 0; $i < 40; $i++) {
            DB::table('patients')->insert([
                'identification' => $faker->unique()->numerify('###########'), // Random unique ID number
                'name' => $faker->name,
                'email' => $faker->email,
                'dob' => $faker->date,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
            ]);
        }
    }
}
