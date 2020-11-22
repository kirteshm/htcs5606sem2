
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php

@session_start();

$orderedProductsIDs = $_SESSION["orderedProductIds"];
$orderedProductsQtys = $_SESSION["orderedProductQtys"];
echo "<div class = 'w3-table-all' >";
echo "<h2 align='center'>We have received your order. Thank you!</h2>";
echo "<table class='w3-table-all w3-card-4' align='center' style='width:90%'>
        <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total</th>
        </tr> ";

$i = 0;
while ($i<sizeof($orderedProductsIDs)){

    $orderedProductsID = $orderedProductsIDs[$i];
    $orderedProductsQty = $orderedProductsQtys[$i];
    $productName = getProductNameByProductID($orderedProductsID);
    $price = getProductPriceByProductID($orderedProductsID);
    $Totalprice = $price * $orderedProductsQty;

    $total = $total + ($price*$orderedProductsQty);

    $i++;

    echo "<tr>
            <td align='center'>$productName</td>
            <td align='center'>$orderedProductsQty</td>
            <td align='center'>$$price</td>
            <td align='center'>$$Totalprice</td>
            </tr> ";


}
$userID = $_SESSION["userID"];

//below code where i had tried to get the current order number also displaying but had no luck.. pls fix it for me if you can
/*$orderID =$_SESSION["orderID"];
$conn = createDatabaseConnection();
$sql = "select * from orders where userID = $userID";
$result = mysqli_query($conn, $sql);
$sql2 = "select * from orderline where orderID = $orderID";
while ($row = $result->fetch_assoc()) {
    $orderID =$_SESSION["orderID"];
    $orderID = $row["orderID"];
}*/

//delivery charges
$delivery = 0;
if ($total>300){
    $delivery = 0;
    $total = $total + $delivery;
}else{
    $delivery = 25;
    $total = $total + $delivery;
}
//echo "<h3 align='center'>Order ID:$orderID</h3>";
echo "</table>";
echo "<h4 align='center'>Invoice Total: $$total</h4>";

echo "</div>";

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



