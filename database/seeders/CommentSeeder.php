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
                'title' => 'comment ccc',
                'description' => 'comment ccc',
                'userID' => 1,
                'adID' => 1],

                [ 'id' => 2,
                'title' => 'comment xxx',
                'description' => 'comment xxx',
                'userID' => 2,
                'adID' => 2],

                [ 'id' => 3,
                'title' => 'comment zzz',
                'description' => 'comment zzz',
                'userID' => 3,
                'adID' => 3],

                [ 'id' => 4,
                'title' => 'comment lll',
                'description' => 'comment lll',
                'userID' => 4,
                'adID' => 4],

                [ 'id' => 5,
                'title' => 'comment kkk',
                'description' => 'comment kkk',
                'userID' => 1,
                'adID' => 4],

                [ 'id' => 6,
                'title' => 'comment jjj',
                'description' => 'comment jjj',
                'userID' => 2,
                'adID' => 2],

                [ 'id' => 7,
                'title' => 'comment hhh',
                'description' => 'comment hhh',
                'userID' => 1,
                'adID' => 9],

                [ 'id' => 8,
                'title' => 'comment ggg',
                'description' => 'comment ggg',
                'userID' => 2,
                'adID' => 8],

                [ 'id' => 9,
                'title' => 'comment fff',
                'description' => 'comment fff',
                'userID' => 5,
                'adID' => 9],

                [ 'id' => 10,
                'title' => 'comment ddd',
                'description' => 'comment ddd',
                'userID' => 4,
                'adID' => 5],

                [ 'id' => 11,
                'title' => 'comment sss',
                'description' => 'comment sss',
                'userID' => 5,
                'adID' => 1],

                [ 'id' => 12,
                'title' => 'comment aaa',
                'description' => 'comment aaa',
                'userID' => 1,
                'adID' => 1],

                [ 'id' => 13,
                'title' => 'comment ppp',
                'description' => 'comment ppp',
                'userID' => 5,
                'adID' => 7],

                [ 'id' => 14,
                'title' => 'comment ooo',
                'description' => 'comment ooo',
                'userID' => 4,
                'adID' => 3],

                [ 'id' => 15,
                'title' => 'comment iii',
                'description' => 'comment iii',
                'userID' => 8,
                'adID' => 5],

                [ 'id' => 16,
                'title' => 'comment uuu',
                'description' => 'comment uuu',
                'userID' => 1,
                'adID' => 4],

                [ 'id' => 17,
                'title' => 'comment yyy',
                'description' => 'comment yyy',
                'userID' => 2,
                'adID' => 2],

                [ 'id' => 18,
                'title' => 'comment ttt',
                'description' => 'comment ttt',
                'userID' => 1,
                'adID' => 1],

                [ 'id' => 19,
                'title' => 'comment rrr',
                'description' => 'comment rrr',
                'userID' => 2,
                'adID' => 3],

                [ 'id' => 20,
                'title' => 'comment eee',
                'description' => 'comment eee',
                'userID' => 2,
                'adID' => 5],

                [ 'id' => 21,
                'title' => 'comment www',
                'description' => 'comment www',
                'userID' => 1,
                'adID' => 5],

                [ 'id' => 22,
                'title' => 'comment qqq',
                'description' => 'comment qqq',
                'userID' => 7,
                'adID' => 5],
            ]);
    
    }
}
