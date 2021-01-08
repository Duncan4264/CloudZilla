<?php
namespace App\Models;

class UserModel implements \JsonSerializable
{
    private $id;
    private $username;
    private $password;
    private $firstname;
    private $lastname;
    private $role;
    private $email;
    
    
    public function __construct($username, $password, $firstname, $lastname, $role, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->role = $role;
        $this->email = $email;
        
    }
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
    
    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getLastname() {
        return $this->lastname;
    }
    public function getRole() {
        return $this->role;
    }
    public function getEmail(){
        return $this->email;
    }
    


    
    
}

