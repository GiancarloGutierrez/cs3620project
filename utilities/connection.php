<?php
session_start();
$servername = "csgiancarlo.mysql.database.azure.com";
"AdminGiancarlo@csgiancarlo";
$username = (isset($_SESSION["SQLUSER"]) ? $_SESSION["SQLUSER"] :$_ENV['SQLUSER']);
$password = (isset($_SESSION["SQLPW"]) ? $_SESSION["SQLPW"]:$_ENV['SQLPW']);
$dbname = "cs3620";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>