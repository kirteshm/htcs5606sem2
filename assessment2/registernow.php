<?php

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$password = $_POST["password"];
$address = $_POST["address"];
$phonenumber = $_POST["phoneNumber"];

//create database connection

$server = "c584md9egjnm02sk.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbusername = "h1r174kgefa2bwv1";
$dbpassword = "nz1tdqgzvtixcxel";
$dbname = "dry1psur1w11ayhb";

$conn = new mysqli($server, $dbusername, $dbpassword, $dbname);

//creat a query
$sql = "INSERT INTO `users`(`id`, `firstname`, `lastname`, `username`, `password`, `address`, `phoneNumber`) 
VALUES (NULL,'$firstname','$lastname','$username','$password','$address','$phonenumber')";

//run the query
mysqli_query($conn, $sql);

echo "Welcome, you are now registered";
echo "<a href='index.php'>Back to Homepage</a>";




