<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanTableSeeder extends Seeder
{

    public function run()
    {
        $date = new \DateTime;

        DB::table('plans')->insert([
            'name'      => 'startup',
            'api_calls' => '500',
            'created_at' => $date,
            'updated_at' => $date

        ]);

        DB::table('plans')->insert([
            'name'      => 'business',
            'api_calls' => '3000',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        DB::table('plans')->insert([
            'name'      => 'professional',
            'api_calls' => '10000',
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }

}