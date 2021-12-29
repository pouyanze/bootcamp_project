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

            ['id' => 4,
            'title' => 'd',
            'description' => 'd',
            'price' => 4,
            'address' => 'd',
            'phoneNumber' => 4,
            'userID' => 3,
            'categoryID' => 1],

            ['id' => 5,
            'title' => 'e',
            'description' => 'e',
            'price' => 5,
            'address' => 'e',
            'phoneNumber' => 5,
            'userID' => 5,
            'categoryID' => 3],

            ['id' => 6,
            'title' => 'f',
            'description' => 'f',
            'price' => 6,
            'address' => 'f',
            'phoneNumber' => 6,
            'userID' => 6,
            'categoryID' => 4],

            ['id' => 7,
            'title' => 'g',
            'description' => 'g',
            'price' => 7,
            'address' => 'g',
            'phoneNumber' => 7,
            'userID' => 7,
            'categoryID' => 5],

            ['id' => 8,
            'title' => 'h',
            'description' => 'h',
            'price' => 8,
            'address' => 'h',
            'phoneNumber' => 8,
            'userID' => 8,
            'categoryID' => 5],

            ['id' => 9,
            'title' => 'i',
            'description' => 'i',
            'price' => 9,
            'address' => 'i',
            'phoneNumber' => 9,
            'userID' => 9,
            'categoryID' => 5],

            ['id' => 10,
            'title' => 'h',
            'description' => 'h',
            'price' => 8,
            'address' => 'h',
            'phoneNumber' => 8,
            'userID' => 9,
            'categoryID' => 5],
        ]);
        
    }
}
