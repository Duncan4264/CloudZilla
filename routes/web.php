<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

 // Goes to the register view
Route::get('/register', function () {
  return view('register');
});
// Goes to the login view
Route::get('/login', function () {
   return view('login');
  });

<<<<<<< HEAD
=======
// Goes to the timecard view
    Route::get('/timecard', function () {
        return view('timecard');
    });

>>>>>>> 3801b9847f0304e766343d8ae1de75d6e0cd3117
Route::get('/home', function () {
        return view('index');
    });

<<<<<<< HEAD
Route::post('/dologin', 'LoginController@index');

Route::post('/register', function() {
   return view('register'); 
});

Route::get('/timecard', function () {
  return view('timecard');
});

// Routes to the Register controller after submitting register forum
Route::post('/doregister', "RegisterController@onRegister");

Route::post('/doclockout', 'TimecardController@Clockout');

Route::post('/doclockin', 'TimecardController@Clockin');


=======
// Do Login
Route::post('/dologin', 'LoginController@index');

// Register
Route::post('/register', function() {
   return view('register'); 
});
// Clock in
Route::post('/doclockin', 'TimecardController@ClockIn');
// Clock out
Route::post('/doclockout', 'TimecardController@Clockout');

// Routes to the Register controller after submitting register forum
Route::post('/doregister', "RegisterController@onRegister");
  
>>>>>>> 3801b9847f0304e766343d8ae1de75d6e0cd3117
        