<?php
namespace App\Services\Buisness;
use App\Models\UserModel;
use App\Services\Data\SecurityDAO;
use \PDO;
use App\Services\Utility\MyLogger1;

class SecurityService
{
    public function login(UserModel $user)
    {
        MyLogger1::info("Entering Security Service.login()");
        $servername = config("database.connections.mysql.host");
        $port = config("database.connections.mysql.port");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        $db  = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $service = new SecurityDAO($db);
        $flag = $service->findByUser($user);
        
        $db = null;
        
        MyLogger1::info("Exit SecurityService.login()");
        
        return $flag;
        
    }
    public function getUser($id)
    {
        MyLogger1::info("Entering SecurityService.getUser()");
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
        
//         MyLogger1::info("Exit SecurityService.getUser() with " . $flag);
        
        return $flag;
    }
    /*
     * Buisness Logic to register a user
     */
    public function register(UserModel $user)
    {
        MyLogger1::info("Entering UserService.register()");
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
        MyLogger1::info("Extiing UserService.register()");
        // Return data from Data Access Object
        return $flag;
    }
    
    public function getAllUsers()
    {
        MyLogger1::info("Entering Security Service.getAllUsers()");
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
        
        MyLogger1::info("Exit SecurityService.getAllUsers() with " , $flag);
        
        return $flag;
    }
}

