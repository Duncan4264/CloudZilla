<?php
namespace App\Services\Data;

use App\Models\UserModel;
use App\Services\Utility\MyLogger1;

class TimecardDAO
{
    private $db = NULL;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function ClockIn(UserModel $user)
    {
        
        MyLogger1::info("Entering UserDAO.createUser()");
        // Grab variables from the user model
        $username = $user->getUsername();
        $in = 'in';
        //
        $stmt = $this->db->prepare('UPDATE `users` SET `Timecard` = :in WHERE `users`.`username` = :username');
        
        // Bind the variables of the PDO statment to the user model variables
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':in', $in);
        
        $stmt->execute();
        
        return true;
    }
    
    public function Clockout(UserModel $user)
    {
        
        MyLogger1::info("Entering UserDAO.createUser()");
        // Grab variables from the user model
        $username = $user->getUsername();
        $in = 'out';
        //
        $stmt = $this->db->prepare('UPDATE `users` SET `Timecard` = :in WHERE `users`.`username` = :username');
        
        // Bind the variables of the PDO statment to the user model variables
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':in', $in);
        
        $stmt->execute();
        
        return true;
    }
}

