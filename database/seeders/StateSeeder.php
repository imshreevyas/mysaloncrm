<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate the table before seeding
        DB::table('state_masters')->truncate();

        $states = [
            [ 'name' => 'Maharashtra' ],
            [ 'name' => 'Gujarat' ]
        ];

        // Insert the data into the states table
        $now = Carbon::now();
        foreach ($states as $state) {
            DB::table('state_masters')->insert([
                'name' => $state['name'],
                'created_at' => $now,  // Set created_at
                'updated_at' => $now,  // Set updated_at
            ]);
        }
    }
}
