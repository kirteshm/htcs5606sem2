<?php
//start a session
@session_start();
//get the session's value
$firstname = $_SESSION["firstname"];
echo "User Firstname: ".$firstname;


