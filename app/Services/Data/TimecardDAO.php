<?php
namespace App\Services\Data;

use App\Models\UserModel;
use App\Services\Utility\Log;
use Illuminate\Support\Facades\Log;

class TimecardDAO
{
    private $db = NULL;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function ClockIn(UserModel $user)
    {
        
        Log::info("Entering UserDAO.createUser()");
        try {
        // Grab variables from the user model
        $username = $user->getUsername();
        $in = 'in';
        //
        $stmt = $this->db->prepare('UPDATE `users` SET `Timecard` = :in WHERE `users`.`username` = :username');
        
        // Bind the variables of the PDO statment to the user model variables
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':in', $in);
        
        $stmt->execute();
        } catch(PDOException $e) {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new Exceiption($e);  
        }
        Log::info("Exiting UserDAO.createUser()");
        
        return true;
    }
    
    public function Clockout(UserModel $user)
    {
        
        Log::info("Entering UserDAO.createUser()");
        try {
        // Grab variables from the user model
        $username = $user->getUsername();
        $in = 'out';
        //
        $stmt = $this->db->prepare('UPDATE `users` SET `Timecard` = :in WHERE `users`.`username` = :username');
        
        // Bind the variables of the PDO statment to the user model variables
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':in', $in);
        
        $stmt->execute();
        }
        catch(PDOException $e)
        {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new Exceiption($e);
            
        }
        Log::info("Exiting UserDAO.createUser()");
        return true;
    }
}

