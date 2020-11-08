<?php
//start a session
@session_start();
//get the session's value
$password = $_SESSION["password"];
echo "Password:".$password;