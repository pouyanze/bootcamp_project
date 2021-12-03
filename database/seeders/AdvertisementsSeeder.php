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
        $userrrIDDD = DB::table('users')->pluck('id')->toArray();
        $category_IDDD = DB::table('categories')->pluck('id')->toArray();

        for ($x = 0; $x <= 3; $x++) {
        DB::table('advertisements')->insert([
            'id' => random_int(1,999),
            'title' => Str::random(10),
            'description' => Str::random(10),
            'price' => random_int(1000,9999),
            'address' => 'Country:Iran, City:' . Str::random(5),
            'phoneNumber' => random_int(9151111,9159999),
            'userID' => array_pop($userrrIDDD),
            'category_id' => array_pop($category_IDDD),
        ]);
        }
    }
}
