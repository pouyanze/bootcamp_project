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
        for ($x = 0; $x <= 10; $x++) {
            DB::table('users')->insert([
                'id' => random_int(1,999),
                'name' => Str::random(10),
                'email' => Str::random(3).'@'.Str::random(3).'.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('password'),
            ]);
          }
    }
}
