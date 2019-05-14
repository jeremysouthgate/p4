<?php

// Namespace & Includes
namespace App;
use Illuminate\Database\Eloquent\Model;


// Login Model
class Login extends Model
{
    // Belongs to a User
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
