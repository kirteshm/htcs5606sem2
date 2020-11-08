<?
//start a session
@session_start();
//get the session's value
$message = $_SESSION["message"];
echo "Message: ".$message;

