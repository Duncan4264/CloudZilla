<?php
namespace App\Services\Buisness;

use App\Models\UserModel;
use App\Services\Utility\MyLogger1;
use App\Services\Data\TimecardDAO;

use Illuminate\Support\Facades\Log;

use PDO;

class TimecardService
{
    
    public function ClockIn(UserModel $user)
    {
        Log::info("Entering TimeCardService.ClockIn()");
        $servername = config("database.connections.mysql.host");
        $port = config("database.connections.mysql.port");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        $db  = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $service = new TimecardDAO($db);
        $flag = $service->ClockIn($user);
        
        $db = null;
        
        MyLogger1::info("Exit SecurityService.login() with " . $flag);
        
        return $flag;
        
    }
    
    public function Clockout(UserModel $user)
    {
        Log::info("Entering TimeCardService.ClockIn()");
        $servername = config("database.connections.mysql.host");
        $port = config("database.connections.mysql.port");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        $db  = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $service = new TimecardDAO($db);
        $flag = $service->Clockout($user);
        
        $db = null;
        
        Log::info("Exit SecurityService.login() with " . $flag);
        
        return $flag;
        
    }
}

