<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserInformation;

class UserInformationTableSeeder extends Seeder
{
    // Seed Settings for User Information Table
    public function run()
    {

        // Test User: Jill
        $user_information = new UserInformation();
        $user_information->first_name = "Jill";
        $user_information->last_name = "Harvard";
        $user_information->gender = "F";
        $user_information->date_of_birth = "1988-01-01";
        $user_information->phone_number = "6171234567";
        $user_information->user_id = 1;
        $user_information->save();

        // Test User: Jamal
        $user_information = new UserInformation();
        $user_information->first_name = "Jamal";
        $user_information->last_name = "Harvard";
        $user_information->gender = "M";
        $user_information->date_of_birth = "1987-01-01";
        $user_information->phone_number = "6170000000";
        $user_information->user_id = 2;
        $user_information->save();
    }
}
