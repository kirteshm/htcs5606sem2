<?php

$username = $_GET["username"]; //inside the square brackets, should be the name of input box.
$password = $_GET["password"];
$number = $_GET["myNumber"];
$Color = $_GET["myColor"];
$select = $_GET["mySelect"];

echo "Username: ".$username;
echo "<br>Password: ".$password;
echo "<br>Number: ".$number;
echo "<br>Color: ".$Color;
echo "<br>Select: ".$select;