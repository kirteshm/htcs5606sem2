<?php

@session_start();

$orderedProductsIDs = $_SESSION["orderedProductIds"];
$orderedProductsQtys = $_SESSION["orderedProductQtys"];

$i = 0;
while ($i<sizeof($orderedProductsIDs)){

    $orderedProductsID = $orderedProductsIDs[$i];
    $orderedProductsQty = $orderedProductsQtys[$i];
    $productName = getProductNameByProductID($orderedProductsID);
    $price = getProductPriceByProductID($orderedProductsID);
    $Totalprice = $price * $orderedProductsQty;

    echo "<p>Name: $productName and Qty: $orderedProductsQty Unit Price: $$price Total Price: $$Totalprice</p>";
    $total = $total + ($price*$orderedProductsQty);

    $i++;
}
echo "<p>Total: $$total</p>";

/**
 * @return Connection
 */
function createDatabaseConnection(){
    //create database connection
    $server = "c584md9egjnm02sk.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $dbusername = "h1r174kgefa2bwv1";
    $dbpassword = "nz1tdqgzvtixcxel";
    $dbname = "dry1psur1w11ayhb";

    $conn = new mysqli($server, $dbusername, $dbpassword, $dbname);
    return $conn;

}

/**
 * @name getProductNameByProductID
 * @param $productID
 * @return Name of product
 */
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

/**
 * @name getProductPriceByProductID
 * @param $productID
 * @return Product Price
 */
function getProductPriceByProductID($productID){

    //create a connection using function

    $conn = createDatabaseConnection();

    //creat a query

    $sql = "select pricePerUnit from product where id=$productID";

    //run the query

    $result = mysqli_query($conn, $sql);

    //show result

    while ($row = $result->fetch_assoc()) {
        $price = $row["pricePerUnit"];
    }
    return $price;
}

$userID = $_SESSION["userID"];
$shipAddress = $_POST["shipAddress"];
date_default_timezone_set("Pacific/Auckland");
$datetime = date("Y-m-d H:i:s");

function createAnOrder($userID, $shipAddress, $datetime)
{
    //connect to database
    $conn = createDatabaseConnection();

    //Query
    $sql = "INSERT INTO `orders`(`orderID`, `userID`, `shipAddress`, `orderdate`) 
            VALUES (NULL,$userID,'$shipAddress','$datetime')";

    //run Query
    mysqli_query($conn, $sql);

    //get order ID
    $orderID = mysqli_insert_id($conn);

    return $orderID;

}

function insertProductToOrderedTable($orderID, $productID, $qty){

    //connect to database
    $conn = createDatabaseConnection();

    // Query
    $sql = "INSERT INTO `orderline`(`orderedProductID`, `orderID`, `productID`, `Qty`) 
            VALUES (NULL,$orderID,$productID,$qty)";

    // run query
    mysqli_query($conn, $sql);
}

//create the order
$orderID = createAnOrder($userID, $shipAddress, $datetime);
$i = 0;
while ($i < sizeof($orderedProductsIDs)){
    $productID = $orderedProductsIDs[$i];
    $qty = $orderedProductsQtys[$i];
    insertProductToOrderedTable($orderID, $productID, $qty);
    $i++;
}

//clear my shopping cart
$_SESSION["orderedProductIds"] = [];
$_SESSION["orderedProductQtys"] = [];