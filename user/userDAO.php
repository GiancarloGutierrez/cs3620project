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
    }
?>