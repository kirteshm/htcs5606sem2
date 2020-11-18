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
    while ($row = $result->fetch_assoc()) {


        echo "<h2 align='center'>Order Received</h2>";
              //<h5 align='center'>Time: " . $row["orderdate"] . "</h5>
        echo  " <h3>The Pet Food Store</h3> ";
             // <h4>Order number: " . $row["orderID"] . "</h4>";


    //second query
    $sql2 = "select * from orderline where orderID = " . $row["orderID"];

    //run the second query
    $result2 = mysqli_query($conn, $sql2);

    while ($row2 = $result2->fetch_assoc()) {
        $name = getProductNameByProductID($row2["productID"]);
       // echo "<p>Product Name: " . $name .  " Qty: " . $row2["Qty"] . "</p>";

        echo " <table style='width: auto'>
               <tr>
               <th>Order ID</th>
               <th>Product Name</th>
               <th>Product Quantity</th>
               </tr>    
               <tr>  
               <td>".$row["orderID"]."</td>
               <td>$name</td>
               <td>".$row2["Qty"]."</td>
               </tr>               
               </table>";

    }
}
echo "<h4>Shipping Address: " . $row["shipAddress"] . "</h4>";
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
}