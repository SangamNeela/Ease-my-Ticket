<?php
$filename=$_FILES["img-file"]["name"];
$tempname=$_FILES["img-file"]["tmp_name"];
$folder="images/".$filename;
move_uploaded_file($tempname,$folder);
$host = "localhost";
$db_name = "test";
$username = "root";
$password = "";
session_start();
$user=$_SESSION['username'];

// Create a MySQLi instance
$conn =mysqli_connect($host, $username, $password, $db_name);
$sql="update users set photo='$folder' WHERE username='$user' ";
mysqli_query($conn,$sql);
header('location:profile2.php?q=1');
?>