<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Nette\Utils\Random;
use Illuminate\Support\Enumerable;
use Illuminate\Support\LazyCollection;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
            DB::table('users')->insert([
                ['id' => 1,
                'name' => 'a',
                'email' => 'a@a.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => 'aaaaaaaa'],

                ['id' => 2,
                'name' => 'b',
                'email' => 'b@b.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => 'bbbbbbbb'],

                ['id' => 3,
                'name' => 'c',
                'email' => 'c@c.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => 'cccccccc']
            ]);
    
    }
}
