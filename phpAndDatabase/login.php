<?php
$username = $_POST["username"];
$password = $_POST["password"];
$select = $_POST["mySelect"];

//create database connection

$server = "c584md9egjnm02sk.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbusername = "h1r174kgefa2bwv1";
$dbpassword = "nz1tdqgzvtixcxel";
$dbname = "dry1psur1w11ayhb";

$conn = new mysqli($server, $dbusername, $dbpassword, $dbname);

if ($conn->error) {
    echo $conn->error;
} else {
    echo "connected";
}
// create a query- select, update, insert, delete
$sql = "select * from users where username = '" .$username. "' and password = '" .$password."'";

//run a query
$result = mysqli_query($conn, $sql);

// show my result

if ($result->num_rows == 1) {
    echo "You have Login";
    while ($row = $result->fetch_assoc()) {
        echo $row["firstname " . "lastname"];
    }
} else {
    echo "Wrong username or password";
}

while ($row = $result->fetch_assoc()) {
    echo $row["firstname"];
}