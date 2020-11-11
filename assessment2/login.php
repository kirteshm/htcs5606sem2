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
        echo "You are now Logged in";
        while ($row = $result->fetch_assoc()) {
            echo $row["firstname " . "lastname"];
            //session start
            @session_start();
            //set session variable
            $_SESSION["userID"] = $row["id"];
            $_SESSION["firstname"] = $row["firstname"];
        }
    } else {
        echo "Wrong username or password";
    }
}
?>
<?php
if (!isset($_SESSION["userID"])) {
    ?>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">

        <input name="username" type="text" placeholder="Username">
        <input name="password" type="password" placeholder="Password"><br>
        <input type="submit" value="Login">

    </form>
    <?php
}
else{
    ?>
    <a href="logout.php">Logout</a>
<?php
}
?>