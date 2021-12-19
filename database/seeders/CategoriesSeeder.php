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
                'nameEn' => 'x',
                'parentID' => 1],
                
                ['id' => 2,
                'name' => 'xx',
                'nameEn' => 'xx',
                'parentID' => 2],
                
            ]);
        

    }
}


