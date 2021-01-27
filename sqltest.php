<?php
$servername = "csgiancarlo";
$username = "AdminGiancarlo";
$password = "logit78!";
$dbname = "csgiancarlo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO shows (showId,showTitle)
VALUES (1,'The Dark Knight')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>