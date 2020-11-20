<link rel = "stylesheet" type = "text/css" href = "css/style.css" >
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    //create database connection

    $server = "c584md9egjnm02sk.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $dbusername = "h1r174kgefa2bwv1";
    $dbpassword = "nz1tdqgzvtixcxel";
    $dbname = "dry1psur1w11ayhb";

    $conn = new mysqli($server, $dbusername, $dbpassword, $dbname);

    //create a query
    $sql = "select * from users
    where username = '$username' and 
    password = '$password'";

    //run the query

    $result = mysqli_query($conn, $sql);

    // show the result

    if ($result->num_rows == 1) {
        echo "<h4 align='center' style='color: maroon'>You are now Logged in</h4>";
        while ($row = $result->fetch_assoc()) {
            echo $row["firstname " . "lastname"];
            //session start
            @session_start();
            //set session variable
            $_SESSION["userID"] = $row["id"];
            $_SESSION["firstname"] = $row["firstname"];
        }
    } else {
        echo "<h4>Wrong username or password</h4><br>";
    }
}
?>
<?php
if (!isset($_SESSION["userID"])) {
    ?>
    <form class="w3-container w3-card-4 w3-light-grey" action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        <h3 style="color: maroon" align="center">Please Login:</h3>
        <div align="center">
        <input class="w3-input" name="username" type="text" placeholder="Username">
        <input class="w3-input" name="password" type="password" placeholder="Password"><br><br>
        <input class= button type="submit" value="Login">
        </div>
    </form>

    <?php
}
else{
    ?>
    <h4 align="center"><a href="logout.php">Logout</a><br></h4>
<?php
}
?>