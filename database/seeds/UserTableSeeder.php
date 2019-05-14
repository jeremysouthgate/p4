<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    // Seed Settings for the Users Table
    public function run()
    {
        $salt = uniqid();
        $user = new User();
        $user->email = "jes4532@g.harvard.edu";
        $user->salt = $salt;
        $user->hash = Hash::make($salt."Password123!");
        $user->activation_status = "active";
        $user->save();
    }
}
