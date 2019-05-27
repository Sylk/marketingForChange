<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);

         factory(App\Company::class, 15)->create();

//        $companies = App\Company::all();
//        $companies->employee()->saveMany(factory(\App\Employee::class, 3)->make());
    }
}
