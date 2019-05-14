<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // Seed the Database.
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(UserInformationTableSeeder::class);
    }
}
