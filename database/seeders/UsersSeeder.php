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
        for ($x = 1; $x <= 3; $x++) {
            DB::table('users')->insert([
                'id' => $x,
                'name' => 'نام کربری'.Str::random(2),
                'email' => Str::random(1).'@'.Str::random(1).'.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('password'),
            ]);
          }
    }
}
