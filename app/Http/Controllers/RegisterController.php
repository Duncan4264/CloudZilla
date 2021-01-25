<?php

namespace App\Http\Controllers;

use App\Services\Utility\MyLogger1;
use App\Models\UserModel;
use App\Services\Buisness\SecurityService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
     * Register method to process register controller
     */
    public function onRegister(Request $request)
    {
        MyLogger1::info("Entering RegisterController.ongRegister()");
        try{    
            // Grab form data
            $username = $request->input('username');
            $password = $request->input('password');
            $email = $request->input('email');
            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $role = "user";
            
            // Create a new User object 
            $user = new UserModel($username, $password, $firstname, $lastname, $role, $email);
            // Create a new security service object
            $sc = new SecurityService();
            
            // Pass data into Security service object method.
            $status = $sc->register($user);
            
            //Render a failed or success response view and pass the user Model
            MyLogger1::info("Exiting RegisterController.onRegister()");
            if($status)
            {
                // return login view on success
                return view('login');
            }
            else
            {
                // return register view on success
                return view('register');
            }
        } catch(ValidationException $e1){
            throw $e1;
        }
    }

}
