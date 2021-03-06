<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            StatusSeeder::class,
            AdminSeeder::class,
            DoctorSeeder::class,
            ReceptionistSeeder::class,
            PatientSeeder::class,
        ]);
    }
}
