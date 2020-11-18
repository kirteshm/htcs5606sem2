<?php

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$password = $_POST["password"];
$address = $_POST["address"];
$phonenumber = $_POST["phoneNumber"];

if ($firstname != "" && $lastname != "" && $username != "" && $password != "" && $address != "" && $phonenumber != "") {

    //create database connection

    $server = "c584md9egjnm02sk.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $dbusername = "h1r174kgefa2bwv1";
    $dbpassword = "nz1tdqgzvtixcxel";
    $dbname = "dry1psur1w11ayhb";

    $conn = new mysqli($server, $dbusername, $dbpassword, $dbname);

//creat a query
    $sql = "INSERT INTO `users`(`id`, `firstname`, `lastname`, `username`, `password`, `address`, `phoneNumber`) 
VALUES (NULL ,'$firstname','$lastname','$username','$password','$address','$phonenumber')";

//run the query

    if (mysqli_query($conn, $sql)) {
        ?>
        <div>
            <?php include "welcome.php"; ?>
        </div>
         <?php
    } else {
        echo "Please Try registering again with all correct details. Thank you";
    }


}

else{
    echo "Please fill in all the details in the Registration form";
}




