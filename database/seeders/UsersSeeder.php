<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'is_admin'=>'yes',
                'name' => 'a',
                'email' => 'a@a.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('aaaaaaaa'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

                ['id' => 2,
                'is_admin'=>'no',
                'name' => 'b',
                'email' => 'b@b.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('bbbbbbbb'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

                ['id' => 3,
                'is_admin'=>'no',
                'name' => 'c',
                'email' => 'c@c.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('cccccccc'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

                ['id' => 4,
                'is_admin'=>'no',
                'name' => 'd',
                'email' => 'd@d.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('dddddddd'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

                ['id' => 5,
                'is_admin'=>'no',
                'name' => 'e',
                'email' => 'e@e.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('eeeeeeee'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

                ['id' => 6,
                'is_admin'=>'yes',
                'name' => 'f',
                'email' => 'f@f.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('ffffffff'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

                ['id' => 7,
                'is_admin'=>'no',
                'name' => 'g',
                'email' => 'g@g.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('gggggggg'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

                ['id' => 8,
                'is_admin'=>'yes',
                'name' => 'h',
                'email' => 'h@h.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('hhhhhhhh'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

                ['id' => 9,
                'is_admin'=>'yes',
                'name' => 'i',
                'email' => 'i@i.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('iiiiiiii'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

                ['id' => 10,
                'is_admin'=>'yes',
                'name' => 'j',
                'email' => 'j@j.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('jjjjjjjj'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")]
            ]);
    
    }
}
