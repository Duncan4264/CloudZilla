<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Logging\Log;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Exception;
use App\Services\Buisness\TimecardService;
use App\Models\UserModel;
use App\Services\Utility\MyLogger1;

class TimecardController extends Controller
{
    public function ClockIn(Request $request) {
        MyLogger1::info("Entering ClockInController.ClockIn()");
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
                MyLogger1::info("Exit ClockutController.Clockout() Clockedin passed");
                return view('clockedin');
            }
            else
            {
                MyLogger1::info("Exit ClockinController.Clockout() Clockedin failed");
                return view('home');
            }
            
            
            
            
        } Catch(Exception $e) {
            throw $e;
        }
    }
    
    public function ClockOut(Request $request) {
        MyLogger1::info("Entering ClockInController.ClockIn()");
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
                MyLogger1::info("Exit ClockoutController.Clockout() Clockout passed");
                return view('clockedout');
            }
            else
            {
                MyLogger1::info("Exit ClockoutController.Clockout() Clockedout failed");
                return view('home');
            }
            
            
            
            
        } Catch(Exception $e) {
            throw $e;
        }
    }
}
