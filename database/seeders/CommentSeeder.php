<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Nette\Utils\Random;
use Illuminate\Support\Enumerable;
use Illuminate\Support\LazyCollection;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userrrIDDD = DB::table('users')->pluck('id')->toArray();
        $adIDDD = DB::table('advertisements')->pluck('id')->toArray();
        for ($x = 1; $x <= 3; $x++) {
            DB::table('comments')->insert([
                'id' => $x,
                'title' => 'عنوان نظر: '.Str::random(2),
                'description' => 'متن نظر: '.Str::random(10),
                'userID' => array_pop($userrrIDDD),
                'adID' => array_pop($adIDDD),
            ]);
            }
    }
}
