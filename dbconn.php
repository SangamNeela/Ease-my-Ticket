<?php
// Database credentials
$host = "localhost";
$db_name = "test";
$username = "root";
$password = "";

// Create a MySQLi instance
$conn =mysqli_connect($host, $username, $password, $db_name);
// Check if the connection is successful
if ($conn==false) {
    die("Connection failed");
}
?>