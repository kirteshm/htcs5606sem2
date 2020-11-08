<?php
//start a session
@session_start();
/*set value to session variables
$_SESSION["username"] = "kit";
$_SESSION["password"] = "test123";
$_SESSION["color"] = "red";
$_SESSION["Address"] = "12 Mt Albert Road"; */

if (isset($_POST["message"])){
    echo "<p>I have a post message in this page</p>";
}else{
    echo "<p>Please post a message to me</p>";
}
?>

<html lang="en">
        <head>
            <title>Session Exercise</title>
        </head>

    <body>

        <ul>
            <li><a href="page1.php">Page 1</a></li>
            <li><a href="page2.php">Page 2</a></li>
            <li><a href="page3.php">Page 3</a></li>
            <li><a href="page4.php">Page 4</a></li>
            <li><a href="page5.php">Page 5</a></li>
        </ul>

    </body>

</html>