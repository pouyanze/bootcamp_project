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
       
            DB::table('comments')->insert([
               [ 'id' => 1,
                'title' => 'c',
                'description' => 'c',
                'userID' => 1,
                'adID' => 1],

                [ 'id' => 2,
                'title' => 'cc',
                'description' => 'cc',
                'userID' => 1,
                'adID' => 2],

                [ 'id' => 3,
                'title' => 'ccc',
                'description' => 'ccc',
                'userID' => 2,
                'adID' => 1],

                [ 'id' => 4,
                'title' => 'cccc',
                'description' => 'cccc',
                'userID' => 2,
                'adID' => 2],
            ]);
    
    }
}
