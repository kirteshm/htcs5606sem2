<?php

@session_start();
?>
<style>
    .cartdetails {
        border: 1px solid maroon;
    }
</style>
<?php

$orderedProductsIDs = $_SESSION["orderedProductIds"];
$orderedProductsQtys = $_SESSION["orderedProductQtys"];

$i = 0;


echo "<h2 align='center'>Shopping Cart</h2>";

echo "<table class='cartdetails' style='width: 90%'>
            <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price Each</th>
            <th>Total Price</th>
            </tr>";

while ($i<sizeof($orderedProductsIDs)) {

    $orderedProductsID = $orderedProductsIDs[$i];
    $orderedProductsQty = $orderedProductsQtys[$i];
    $productName = getProductNameByProductID($orderedProductsID);
    $price = getProductPriceByProductID($orderedProductsID);
    $Totalprice = $price * $orderedProductsQty;


     echo   "<tr align='center'>
            <td>$productName</td>
            <td>$orderedProductsQty</td>
            <td>$$price</td>
            <td>$$Totalprice</td>
            </tr>";

    $total = $total + ($price * $orderedProductsQty);

    $i++;
}
echo "</table>";
?>
<br>
<?php

//free delivery over $300 purchase
$delivery = 25; // default delivery charge
if ($total > 300) {
    $delivery = 0;
    echo "<h2 style='alignment: center'>Congratulation! you qualified for Free Delivery</h2>";
    $total1 = $total;
}else{
    $delivery = 25;
    $total1 = $total + $delivery;
}
echo"<p>Deliver Charges: $$delivery</p>";
echo "<h2 style='alignment: center'>Total: $$total1</h2>";

//if the user is logged in than show form for checkout
if (isset($_SESSION["userID"])){
    ?>
    <form style="alignment: center" action="reviewOrder.php" method="post">
        <label><h4>Shipping Address</h4></label>
        <textarea name="shipAddress" rows="4" cols="60" placeholder="Shipping Address if Different"></textarea><br><br>
        <input type="submit" value="Checkout Now">
    </form>
   <?php
}
else{
    Echo "Please Login to place the order";

}
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
