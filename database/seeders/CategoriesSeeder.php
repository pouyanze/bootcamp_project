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
        
            DB::table('categories')->insert([
                ['id' => 1,
                'name' => 'x',
                'nameEn' => 'x'],
                
                ['id' => 2,
                'name' => 'y',
                'nameEn' => 'y'],

                ['id' => 3,
                'name' => 'z',
                'nameEn' => 'z'],
                
                ['id' => 4,
                'name' => 'q',
                'nameEn' => 'q'],

                ['id' => 5,
                'name' => 'w',
                'nameEn' => 'w'],

                ['id' => 6,
                'name' => 'm',
                'nameEn' => 'm'],

                ['id' => 7,
                'name' => 'n',
                'nameEn' => 'n'],

                ['id' => 8,
                'name' => 'v',
                'nameEn' => 'v'],

                ['id' => 9,
                'name' => 'g',
                'nameEn' => 'g'],

                ['id' => 10,
                'name' => 't',
                'nameEn' => 't'],
                
            ]);
        

    }
}


