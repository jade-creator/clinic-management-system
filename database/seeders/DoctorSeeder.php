<?php

namespace Database\Seeders;

//use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Doctor::factory()->count(1)->create();
        DB::table('users')->delete();
        
        $doctors = [
            [
                'name' => 'Doctor',
                'email' => 'doctor@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('qwert@1Q'), // password
                'remember_token' => Str::random(10),
                'role_id' => 2,
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => $this->faker->name(),
                'email' => $this->faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('qwert@1Q'), // password
                'remember_token' => Str::random(10),
                'role_id' => 2,
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => $this->faker->name(),
                'email' => $this->faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('qwert@1Q'), // password
                'remember_token' => Str::random(10),
                'role_id' => 2,
                'created_at' => now(), 
                'updated_at' => now()
            ]
        ];

        DB::table('users')->insert($doctors);
    }
}
