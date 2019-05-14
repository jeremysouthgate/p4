<?php
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
// Routes
////////////////////////////////////////////////////////////////////////////////

// Includes
use Illuminate\Auth\Events\Logout;


// GET Views

// Homepage
Route::get('/', 'RouteController@welcome_page');

// Register
Route::get('/register', 'RouteController@registration_page');

// Registration Step 2
Route::get('/nextstep', 'RouteController@nextstep');

// Complete Registration/Activation
Route::get('/activate', 'RouteController@activation_page');

// Login
Route::get('/go', 'RouteController@login_page');
Route::get('/login', 'RouteController@login_page');

// Profile
Route::get('/profile', 'RouteController@profile');

// Reset
Route::get('/reset', 'RouteController@reset_page');

// New Password
Route::get('/newpassword', 'RouteController@newpassword');

// Logout
Route::get('/logout', 'RouteController@logout');


// Action Handling

// Register
Route::post('/register', 'AuthController@register');

// Activate
Route::post('/activate', 'AuthController@activate');

// Login
Route::post('/login', 'AuthController@login');

// Reset
Route::post('/reset', 'AuthController@reset');

// Update Password
Route::put('/newpassword', 'AuthController@newpassword');


// Error Handling

// Fallback Route
Route::fallback(function(){
    return redirect('/');
});


////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
