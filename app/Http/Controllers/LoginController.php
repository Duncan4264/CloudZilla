<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Buisness\SecurityService;
use App\Services\Utility\MyLogger1;
use Illuminate\Http\Request;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

    public function validateForm(Request $request)
    {
        $rules = ['username' => 'Required | Between:4,10 | Alpha',
            'password' => 'Required | Between:4,10'];
        $this->validate($request, $rules);
    }

        //A String Method to test Route
        public function index(Request $request)
        {
            Log::info("Entering LoginController.index()");
           
            try
            {
                $this->validateForm($request);
                //Get the requested form data
                $username = $request->input('username');
                $password = $request->input('password');
                
                Log::info("Paramaters: ", array("username" => $username, "password" => $password));
                
                // Save posted form data in User Object Model
                $user = new UserModel(-1, $username, $password);
                
                $service = new SecurityService();
                $status = $service->login($user);
                
                //Render a failed or success response view and pass the user Model
                if($status)
                {
                    Log::info("Exut Login4Controller.index(), Login Passed");
                    $data = ['model' => $user];
                    return view('loginPassed')->with($data);
                }
                else
                {
                    Log::info("Exit Login4controller.index() Login Failed");
                    return view('loginFailed');
                }
                $user = new UserModel(-1, $username, $password);
            } catch(ValidationException $e1){
               throw $e1;
            }
            
        
        }
        /*
         * Register method to process register controller
         */
        public function onRegister(Request $request)
        {
            MyLogger1::info("Entering RegisterController.ongRegister()");
            try{
                $this->validateForm($request);
                // Grab form data
                $username = $request->input('username');
                $password = $request->input('password');
                $email = $request->input('email');
                $firstname = $request->input('firstname');
                $lastname = $request->input('lastname');
                $role = null;
                
                // Create a new User object
                $user = new UserModel($firstname, $lastname, $username, $password, $email);
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
