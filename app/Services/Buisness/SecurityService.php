<?php
namespace App\Services\Buisness;
use App\Models\UserModel;
use App\Services\Data\SecurityDAO;
use \PDO;
use App\Services\Utility\MyLogger1;
use Illuminate\Support\Facades\Log;

class SecurityService
{
    public function login(UserModel $user)
    {
        Log::info("Entering Security Service.login()");
        try{
            // Call database configuration strings from the .env
        $servername = config("database.connections.mysql.host");
        $port = config("database.connections.mysql.port");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
            //PDO SQL connection creation
        $db  = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $service = new SecurityDAO($db);
        $flag = $service->findByUser($user);
        
        $db = null;
        
        Log::info("Exit SecurityService.login()");
        
        return $flag;
        } catch(Exception $e)
        {
            throw New Exception($e);
        }
        
    }
    public function getUser($id)
    {
        Log::info("Entering SecurityService.getUser()");
        try{

        
        $servername = config("database.connections.mysql.host");
        $port = config("database.connections.mysql.port");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        $db  = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $service = new SecurityDAO($db);
        $flag = $service->findByUserID($id);
        
        $db = null;
        
        Log::info("Exit SecurityService.getUser() with " . $flag);
        
        return $flag;
        } catch(Exception $e)
        {
            throw new Exception($e);
        }
    }
    /*
     * Buisness Logic to register a user
     */
    public function register(UserModel $user)
    {
        Log::info("Entering UserService.register()");
        try{
            
        
        // Call the database config variables
        $servername = config("database.connections.mysql.host");
        $port = config("database.connections.mysql.port");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        // Create a new PDO connection
        $db  = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Pass connection to Data Access Object
        $service = new SecurityDAO($db);
        // Create user in Data Acess Object
        $flag = $service->createUser($user);
        // Close database connection
        $db = null;
        Log::info("Extiing UserService.register()");
        // Return data from Data Access Object
        return $flag;
        } catch (Exception $e)
        {
            throw new Exception($e);
        }
    }
    
    public function getAllUsers()
    {
        Log::info("Entering Security Service.getAllUsers()");
        try {
        $servername = config("database.connections.mysql.host");
        $port = config("database.connections.mysql.port");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        $db  = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $service = new SecurityDAO($db);
        $flag = $service->findAllUsers();
        
        $db = null;
        
        
        Log::info("Exit SecurityService.getAllUsers() with " , $flag);
        
        return $flag;
        } catch(PDOEXCEIPTON $e)
        {
            throw new Exception($e);
        }
    }
}

