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
function getProductNameByProductID($productID)
{
    //create a connection

    $conn = createDatabaseConnection();

    //creat a query

    $sql = "select productName from product where id=$productID";

    //run the query

    $result = mysqli_query($conn, $sql);

    //show result

    while ($row = $result->fetch_assoc()) {
        $name = $row["productName"];
    }
    return $name;

// connect to database
$conn = createDatabaseConnection();

// first query
$sql = "select * from orders where userID = $userID";

//run the first query
$result = mysqli_query($conn, $sql);

//show the first query
while ($row = $result ->fetch_assoc()){
    echo "<h2>Invoice - The Pet Food Store</h2>"
    echo "<h4> Your order number is: ".$row["orderID"]."</h3>";
    echo "<h4>Shipping Address: ".$row["shipAddress"]."</h4>";
    echo "<h2>Time: ".$row["orderdate"]."</h2>";

    //second query
    $sql2 = "select * from orderline where orderID = ".$row["orderID"];


    //run the second query
    $result2 = mysqli_query($conn, $sql2);

    while ($row2 = $result2->fetch_assoc()) {
        echo "<p>Product Name: $name Qty: " . $row2["Qty"] . "</p>";

    }


}

