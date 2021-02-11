<?php

class userDAO{
    public function getUser($user){
        require_once('./utilities/connection.php');

        $sql = ("SELECT first_name, last_name, username, user_id FROM user WHERE user_id = 1");
        $result = $conn->query($sql);

        if($result->num_rows>0){
            //output data of each row
            while($row = $result->fetch_assoc()){
                $user->setUserID($row["user_id"]);
                $user->setFirstName($row["first_name"]);
                $user->setLastName($row["last_name"]);
                $user->setUserName($row["username"]);
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