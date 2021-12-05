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
        for ($x = 1; $x <= 3; $x++) {
            DB::table('categories')->insert([
                'id' => $x,
                'name' => 'CategoryName: '.Str::random(2),
                'nameEn' => 'CategoryEnName: '.Str::random(2),
                'parentID' => random_int(1,999),
            ]);
          }

    }
}


