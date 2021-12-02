<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ads')->insert([
            'title' => 'pouyan\'s'.Str::random(10),
            'description' => Str::random(20),
            'price' => mt_rand(100, 1000),
            'address' => 'city:'. Str::random(6),
            'phoneNumber' => mt_rand(091500000, 091599999),

        ]);
    }
}
