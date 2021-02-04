<?php
session_start();
$servername = "csgiancarlo.mysql.database.azure.com";

$username = (isset($_SESSION["SQLUSER"]) ? $_SESSION["SQLUSER"] :$_ENV['SQLUSER']);
$password = (isset($_SESSION["SQLPW"]) ? $_SESSION["SQLUSER"]:$_ENV['SQLPW']);
$dbname = "cs3620";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO books (bookId,bookTitle,bookAuthor)
VALUES (1,'Think and Grow Rich","Napoleon Hill")";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT bookId, bookTitle, bookAuthor FROM books WHERE showID = 1";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<br>"."BookID: " . $row["bookId"]. " - BookTitle: " .$row["bookTitle"]." - BookAuthor: ".$row["bookAuthor"]."<br>";
    }
} else {
    echo "0 results";
}

$sql = "DELETE FROM book WHERE bookId = 1";

if($conn->query($sql) === TRUE){
    echo "Record deleted successfully";
} else{
    echo "Error deleting record: ". $conn->error;
}

$conn->close();
?>