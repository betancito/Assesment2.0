<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Run patientSeeder
        $this->call([
            PatientSeeder::class,
        ]);

        $this->call([
            RoleSeeder::class,
        ]);
    }
}
