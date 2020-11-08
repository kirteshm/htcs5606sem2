<?php
//start a session
@session_start();
//get the session's value
$color = $_SESSION["color"];
echo "Color:".$color;
