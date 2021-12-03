<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 3; $x++) {
            DB::table('categories')->insert([
                'id' => random_int(1,999),
                'name' => Str::random(10),
                'nameEn' => 'EnglishVersionOfName: '.Str::random(10),
                'parentID' => random_int(1,999),
            ]);
          }

    }
}


