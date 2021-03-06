<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('qwert@1Q'), // password
            'remember_token' => Str::random(10),
            'role_id' => 1,
            'created_at' => now(), 
            'updated_at' => now()
        ]);
    }
}
