<?php
require_once('./user/userDAO.php');
header("Access-Control-Allow-Origin: *");

Class User implements \JsonSerializable{
    //Properties
    private $username;
    private $user_id;
    private $first_name;
    private $last_name;
    private $password;

    //Methods
    function __construct(){

    }
    public function getUser($value1,$option1){
        switch ($option1){
            case "userid":
                $this->user_id = $value1;
                break;
            case "userName":
                $this->username = "'".$value1."'";
                break;
            case "firstName";
                $this->first_name = "'".$value1."'";
                break;
            case "lastName";
                $this->last_name = "'".$value1."'";
                break;
        }
        $userDAO = new userDAO();
        $userDAO->getUser($this,$option1);
        return $this;
    }
    
    public function createUser(){
        $userDAO = new userDAO();
        $userDAO->createUser($this);
    }
    public function setPassword($password){
        $this->password = hash("sha256",$password);
    }

    public function getUserName(){
        return $this->username;
    }
    
    public function setUsername($username){
        $this->username = $username;
    }
    public function getUserID(){
        return $this->user_id;
    }
    public function setUserID($user_id){
        $this->user_id= $user_id;
    }
    public function getFirstName(){
        return $this->first_name;
    }
    public function setFirstName($first_name){
        $this->first_name = $first_name;
    }
    public function getLastName(){
        return $this->last_name;
    }
    public function setLastName($last_name){
        $this->last_name = $last_name;
    }
    public function getPassword(){
        return $this->password;
    }
    public function deleteUser($username){
        $userDAO = new userDAO();
        $userDAO->deleteUser($username);
    }
    public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
}

?>