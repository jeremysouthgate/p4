<?php

// Namespace & Includes
namespace App;
use Illuminate\Database\Eloquent\Model;


// User Model
class User extends Model
{
    // Has Logins.
    public function login()
    {
        return $this->hasMany('App\Login');
    }

    // Has UserInformation.
    public function user_information()
    {
        return $this->hasOne('App\UserInformation');
    }
}
