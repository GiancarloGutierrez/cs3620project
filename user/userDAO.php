<?php
header("Access-Control-Allow-Origin: *");
class userDAO{
    public function getUser($user,$option1){
        require_once('./utilities/connection.php');
        $sql = "";
        switch($option1){
            case "userid":
                $sql = ("SELECT first_name, last_name, username1, user_id FROM user WHERE user_id =".$user->getUserID());
                break;
            case "userName":
                $sql = ("SELECT first_name, last_name, username1, user_id FROM user WHERE username1 =".$user->getUserName());
                break;
            case "firstName";
                $sql = ("SELECT first_name, last_name, username1, user_id FROM user WHERE first_name =".$user->getFirstName());
                break;
            case "lastName";
                 $sql = ("SELECT first_name, last_name, username1, user_id FROM user WHERE last_name =".$user->getLastName());
                break;
        }
        
        $result = $conn->query($sql);

        if($result->num_rows>0){
            //output data of each row
            while($row = $result->fetch_assoc()){
                $user->setUserID($row["user_id"]);
                $user->setFirstName($row["first_name"]);
                $user->setLastName($row["last_name"]);
                $user->setUserName($row["username1"]);
            }
        } else {
            echo "0 results";
        }
            $conn->close();
    }
    public function createUser($user){
        require_once('./utilities/connection.php');

        $sql = "INSERT INTO cs3620.user
        (
            username1,
            password1,
            first_name,
            last_name
        )
        VALUES
        (
            '". $user->getUsername() ."',
            '". $user->getPassword() ."',
            '". $user->getFirstName() ."',
            '". $user->getLastName() ."'
        );";
        echo $sql;
        $result= $conn->query($sql);
        $conn->close();
        echo "Created User";
    }
    public function deleteUser($username1){
        require_once('./utilities/connection.php');

        $sql = "DELETE FROM cs3620.user WHERE username ='". $username1."';";
        $result= $conn->query($sql);
        $conn->close();
        echo "Deleted User";
    }
}
?>