<?php

class UsersTableSeeder extends DatabaseSeeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@site.com',
            'password' => 'password'
        ]);

        DB::table('users')->insert([
            'name' => 'manager',
            'email' => 'manager@site.com',
            'password' => 'password'
        ]);
    }
}