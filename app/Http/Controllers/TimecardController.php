<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Logging\Log;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Exception;
use App\Services\Buisness\TimecardService;
use App\Models\UserModel;

class TimecardController extends Controller
{
    public function ClockIn(Request $request) {
        Log::info("Entering ClockInController.ClockIn()");
        try {
            $username = session()->get('username');
            $service = new TimecardService();
            $username = session()->get('username');
            $password = 'null';
            $firstname = session()->get('firstname');
            $lastname = session()->get('lastname');
            $role = session()->get('role');
            $email = session()->get('email');
            $user = new UserModel($username, $password, $firstname, $lastname, $role, $email);
            $status = $service->ClockIn($user);
            if($status)
            {
                Log::info("Exit ClockutController.Clockout() Clockedin passed");
                return view('clockedin');
            }
            else
            {
                Log::info("Exit ClockinController.Clockout() Clockedin failed");
                return view('home');
            }
            
            
            
            
        } Catch(Exception $e) {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw $e;
        }
    }
    
    public function ClockOut(Request $request) {
        Log::info("Entering ClockInController.ClockIn()");
        try {
            $username = session()->get('username');
            $service = new TimecardService();
            $username = session()->get('username');
            $password = 'null';
            $firstname = session()->get('firstname');
            $lastname = session()->get('lastname');
            $role = session()->get('role');
            $email = session()->get('email');
            $user = new UserModel($username, $password, $firstname, $lastname, $role, $email);
            $status = $service->Clockout($user);
            if($status)
            {
                Log::info("Exit ClockoutController.Clockout() Clockout passed");
                return view('clockedout');
            }
            else
            {
                Log::info("Exit ClockoutController.Clockout() Clockedout failed");
                return view('home');
            }
            
            
            
            
        } Catch(Exception $e) {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw $e;
        }
    }
}
