<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Nette\Utils\Random;
use Illuminate\Support\Enumerable;
use Illuminate\Support\LazyCollection;


class FavouriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('favourites')->insert([
                ['id' => 1,
                'favourite' => 'yes',
                'user_id' => 1,
                'advertisement_id' => 1],

                ['id' => 2,
                'favourite' => 'yes',
                'user_id' => 1,
                'advertisement_id' => 2],

                ['id' => 3,
                'favourite' => 'yes',
                'user_id' => 1,
                'advertisement_id' => 3],

                ['id' => 4,
                'favourite' => 'no',
                'user_id' => 1,
                'advertisement_id' => 4],

                ['id' => 5,
                'favourite' => 'yes',
                'user_id' => 2,
                'advertisement_id' => 1],

                ['id' => 6,
                'favourite' => 'yes',
                'user_id' => 2,
                'advertisement_id' => 4],

                ['id' => 7,
                'favourite' => 'yes',
                'user_id' => 3,
                'advertisement_id' =>5],

                ['id' => 8,
                'favourite' => 'yes',
                'user_id' => 4,
                'advertisement_id' => 1],

                ['id' => 9,
                'favourite' => 'yes',
                'user_id' => 5,
                'advertisement_id' => 2],

                ['id' => 10,
                'favourite' => 'yes',
                'user_id' => 5,
                'advertisement_id' => 4],
            ]);

    }
}
