<?php
$servername = "localhost";
$username = "swift";
$password = "P4oRnJLJl0TXlV7c";
// $database = "swift";
$database = "library";

$conn = new mysqli("localhost","swift" ,"P4oRnJLJl0TXlV7c" ,"swift");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
