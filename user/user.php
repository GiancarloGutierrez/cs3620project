<?php
require_once('./user/userDAO.php');
Class User{
    //Properties
    private $username;
    private $user_id;
    private $first_name;
    private $last_name;
    private $password;

    //Methods
    function __construct(){

    }
    public function getUser($user_id){
        $this->user_id = $user_id;

        $userDAO = new userDAO();
        $userDAO->getUser($this);
        return $this;
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
        $this->user_id= user_id;
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
}

?>