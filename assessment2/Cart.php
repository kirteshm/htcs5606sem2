<?php

@session_start();

$orderedProductsIDs = $_SESSION["orderedProductIds"];
$orderedProductsQtys = $_SESSION["orderedProductQtys"];

$i = 0;
$delivery = 25; // default delivery charge
while ($i<sizeof($orderedProductsIDs)) {

    $orderedProductsID = $orderedProductsIDs[$i];
    $orderedProductsQty = $orderedProductsQtys[$i];
    $productName = getProductNameByProductID($orderedProductsID);
    $price = getProductPriceByProductID($orderedProductsID);
    $Totalprice = $price * $orderedProductsQty;

    echo "<p>Name: $productName and Qty: $orderedProductsQty Unit Price: $$price Total Price: $$Totalprice</p>";
    $total = $total + ($price * $orderedProductsQty);

    $i++;
}

//if the user is logged in than show form for checkout
if (isset($_SESSION["userID"])){
?>

<form action="checkout.php" method="post">
    <textarea name="shipAddress" rows="10" cols="20" placeholder="Shipping Address if different to registered address"></textarea>
    <input type="submit" value="Checkout Now">
</form>


<?php
}
else{
    Echo "Please Login to place the order";
}
//free delivery over $300 purchase

if ($total > 300) {
    $delivery = 0;
    echo "Congratulation! you qualified for Free Delivery";
}else{
    $total = $total + $delivery;
}
echo"<p>Deliver Charges: $$delivery</p>";
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
