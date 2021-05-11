<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->delete();
        $statuses = [
            [ 'name' => 'requested', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'name' => 'pending confirmation', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'name' => 'confirmed', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'name' => 'completed', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'name' => 'cancelled', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ],
            [ 'name' => 'no show', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ]
        ];

        DB::table('statuses')->insert($statuses);
    }
}
