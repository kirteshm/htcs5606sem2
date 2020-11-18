<?php
@session_start();
$userID = $_SESSION["userID"];

function createDatabaseConnection()
{
    //create database connection
    $server = "c584md9egjnm02sk.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $dbusername = "h1r174kgefa2bwv1";
    $dbpassword = "nz1tdqgzvtixcxel";
    $dbname = "dry1psur1w11ayhb";

    $conn = new mysqli($server, $dbusername, $dbpassword, $dbname);
    return $conn;
}
// connect to database
$conn = createDatabaseConnection();

// first query
$sql = "select * from orders where userID = $userID";

//run the first query
$result = mysqli_query($conn, $sql);

//show the first query
while ($row = $result ->fetch_assoc()){
    echo "<h3>Order Number: ".$row["orderID"]."</h3>";
    echo "<h3>Shipping Address: ".$row["shipAddress"]."</h3>";
    echo "<h3>Time: ".$row["orderdate"]."</h3>";

    //second query
    $sql2 = "select * from orderline where orderID = ".$row["orderID"];


    //run the second query
    $result2 = mysqli_query($conn, $sql2);

    while ($row2 = $result2->fetch_assoc()) {
        echo "<p>ID: " . $row2["productID"] . " Qty: " . $row2["Qty"] . "</p>";


        $sql3 = "select * from product where id = " . $row["id"];

        $result3 = mysqli_query($conn, $sql3);

        while ($row3 = $result3->fetch_assoc()) {
            echo "<p>Product Name: " . $row3["productName"] . " Quanity: " . $row2["Qty"] . "</p>";
        }
    }
}

