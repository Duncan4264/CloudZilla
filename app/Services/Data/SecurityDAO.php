<?php
namespace App\Services\Data;

use App\Models\UserModel;
use PDO;
use PDOException;

class SecurityDAO
{
    private $db = NULL;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    /*
     * Method to create a user
     */
    public function createUser(UserModel $user)
    {
        Log::info("Entering UserDAO.createUser()");
        try {
        // Grab variables from the user model
        $username = $user->getUsername();
        $password = $user->getPassword();
        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $email = $user->getEmail();
        $role = $user->getRole();
        //         try {
        //          // PDO statement to insert the user into the Users table
        $stmt = $this->db->prepare('INSERT
       INTO `Users`
       (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `role`)
       VALUES
       (NULL, :username, :password, :email,  :firstname, :lastname, :role)');
        // Bind the variables of the PDO statment to the user model variables
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        
        
        Log::info("Exiting UserDAO.createUser()");
        } catch (PDOException $e) {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new Exception($e);
        }
        return true;
        
        
    }
    /*
     * Find by username
     */
    public function findByUser(UserModel $user)
    {
        Log::info("Entering SecurityDAO.findByUser");
        try{
            $name = $user->getUsername();
            $pw = $user->getPassword();
            $stmt = $this->db->prepare('SELECT USERNAME, PASSWORD, FIRST_NAME, LAST_NAME, ROLE, EMAIL
                                       FROM Users
                                       WHERE USERNAME = :username AND PASSWORD = :password');
            $stmt->bindParam(':username', $name);
            $stmt->bindParam(':password', $pw);
            $stmt->execute();
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $user = new UserModel($row['USERNAME'], $row['PASSWORD'], $row['FIRST_NAME'], $row['LAST_NAME'], $row['ROLE'], $row['EMAIL']);
            
            if($stmt->rowCount() == 1)
            {
                 Log::info("Exit SecurityDAO.findByUser() with true");
                return $user;
            }
            else
            {
              Log::info("Exit SecurityDAO.findByUser() with false");
              return false;
            }
            } catch(PDOException $e){
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new Exception($e);
//             throw new DatabaseException($message) . "Database eception: " . $e->getMessage()  0 , $e);
        }
    }
    public function findByUserID($id)
    {
        Log::info("Entering SecurityDAO.findByUserID");
        try{
            $stmt = $this->db->prepare('SELECT ID, USERNAME, PASSWORD
                                       FROM Users
                                       WHERE ID = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            if($stmt->rowCount() == 0)
            {
                Log::info("Exit SecurityDAO.findByUserID() with false");
                return null;
            }
            else
            {
                Log::info("Exit SecurityDAO.findByUserID() with true");
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $user = new UserModel($row['ID'], $row['USERNAME'], $row['PASSWORD']);
                return $user;
            }
        } catch(PDOException $e){
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new Exception($e);
           //throw new DatabaseException($message) . "Database eception: " . $e->getMessage()  0 , $e);
        }
    }
    public function findAllUsers()
    {
        Log::info("Entering SecurityDAO.findAllUsers");
        try{
            $stmt = $this->db->prepare('SELECT ID, USERNAME, PASSWORD
                                       FROM Users');
            $stmt->execute();
            
            if($stmt->rowCount() == 0)
            {
                Log::info("Exit SecurityDAO.findAllUsers() with false");
                return array();
            }
            else
            {
                $index = 0;
                $users = array();
                Log::info("Exiting SecurityDAO.findAllUsers() with true");
                while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $user = new UserModel($row['ID'], $row['USERNAME'], $row['PASSWORD']);
                    $users[$index++] = $user;
                }
                return $users;
            }
        } catch(PDOException $e){
            Log::error("Exception: ", array("message" => $e->getMessage()));
           throw new Exception($e);
        }
    }
}

