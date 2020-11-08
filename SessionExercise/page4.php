<?
//start a session
@session_start();
//get the session's value
$Address = $_SESSION["Address"];
echo "Address:".$Address;
