<?php

// Namespace & Includes
namespace App;
use Illuminate\Database\Eloquent\Model;


// UserInformation Model
class UserInformation extends Model
{
    // Belongs to a User
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
