<?php
$servername = "replace with yours";
$username = "replace with yours";
$password = "";
$dbname = "replace with yours";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    "connection iko poa";
}
?>
