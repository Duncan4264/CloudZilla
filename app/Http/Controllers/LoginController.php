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
                // Validate the request
                $this->validateForm($request);
                //Get the requested form data
                $username = $request->input('username');
                $password = $request->input('password');
                $firstname = "null";
                $lastname = "null";
                $email = "null";
                $roll = "user";
                
                Log::info("Paramaters: ", array("username" => $username, "password" => $password));
                
                // Save posted form data in User Object Model
                $user = new UserModel($username, $password, $firstname, $lastname, $roll, $email);
                
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
                // Catch an error
            } catch(ValidationException $e1){
                // Thre a new Error exception
                Log::error("Exception: ", array("message" => $e->getMessage()));
               throw $e1;
            }
            
        
        }
}
       
