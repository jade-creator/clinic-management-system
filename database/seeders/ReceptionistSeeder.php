<?php

namespace Database\Seeders;

//use App\Models\Receptionist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ReceptionistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Receptionist::factory()->count(1)->create();
        DB::table('users')->insert([
            'name' => 'Receptionist',
            'email' => 'receptionist@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('qwert@1Q'), // password
            'remember_token' => Str::random(10),
            'role_id' => 3,
            'created_at' => now(), 
            'updated_at' => now()
        ]);
    }
}
