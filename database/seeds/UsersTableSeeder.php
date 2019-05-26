<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder
{
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@site.com',
            'password' => 'password'
        ]);

        DB::table('users')->insert([
            'email' => 'manager@site.com',
            'password' => 'password'
        ]);
    }
}