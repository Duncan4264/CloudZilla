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

Route::get('/home', function () {
        return view('index');
    });
Route::get('/timecard', function () {
      return view('timecard');
    });

Route::post('/dologin', 'LoginController@index');

Route::post('/register', function() {
   return view('register'); 
});


// Routes to the Register controller after submitting register forum
Route::post('/doregister', "RegisterController@onRegister");

Route::post('/doclockout', 'TimecardController@Clockout');

Route::post('/doclockin', 'TimecardController@Clockin');


        
