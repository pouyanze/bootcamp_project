<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Nette\Utils\Random;
use Illuminate\Support\Enumerable;
use Illuminate\Support\LazyCollection;


class AdvertisementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        
        DB::table('advertisements')->insert([
            ['id' => 1,
            'title' => 'a',
            'description' => 'a',
            'price' => 1,
            'address' => 'a',
            'phoneNumber' => 1,
            'userID' => 1,
            'categoryID' => 1],

            ['id' => 2,
            'title' => 'b',
            'description' => 'b',
            'price' => 2,
            'address' => 'b',
            'phoneNumber' => 2,
            'userID' => 1,
            'categoryID' => 1],

            ['id' => 3,
            'title' => 'c',
            'description' => 'c',
            'price' => 3,
            'address' => 'c',
            'phoneNumber' => 3,
            'userID' => 2,
            'categoryID' => 2],
        ]);
        
    }
}
