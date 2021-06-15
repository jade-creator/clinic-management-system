<?php

namespace Database\Seeders;

use App\Models\Receptionist;
use Illuminate\Database\Seeder;

class ReceptionistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Receptionist::factory()->count(1)->create();
    }
}
