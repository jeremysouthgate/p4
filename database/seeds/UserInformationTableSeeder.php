<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserInformation;

class UserInformationTableSeeder extends Seeder
{
    // Seed Settings for User Information Table
    public function run()
    {
        $user_information = new UserInformation();
        $user_information->first_name = "Jeremy";
        $user_information->last_name = "Southgate";
        $user_information->gender = "M";
        $user_information->date_of_birth = "1990-01-01";
        $user_information->phone_number = "1234567890";
        $user_information->user_id = 1;
        $user_information->save();
    }
}
