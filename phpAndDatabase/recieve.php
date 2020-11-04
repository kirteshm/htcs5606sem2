<?php

$username = $_POST["username"]; //inside the square brackets, should be the name of input box.
$password = $_POST["password"];
$number = $_POST["myNumber"];
$Color = $_POST["myColor"];
$select = $_POST["mySelect"];

echo "Username: ".$username;
echo "<br>Password: ".$password;
echo "<br>Number: ".$number;
echo "<br>Color: ".$Color;
echo "<br>Select: ".$select;