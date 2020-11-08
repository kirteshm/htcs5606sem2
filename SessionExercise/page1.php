<?php

//start a session
@session_start();
//get the session's value
$username = $_SESSION["username"];
echo "Username:".$username;


