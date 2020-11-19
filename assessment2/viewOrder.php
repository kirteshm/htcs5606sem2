<?php
@session_start();
$userID = $_SESSION["userID"];

/*$orderedProductsIDs = $_SESSION["orderedProductIds"];
$orderedProductsQtys = $_SESSION["orderedProductQtys"];

$i = 0;
 while ($i<sizeof($orderedProductsIDs)) {

    $orderedProductsID = $orderedProductsIDs[$i];
    $orderedProductsQty = $orderedProductsQtys[$i];
    $productName = getProductNameByProductID($orderedProductsID);
    $price = getProductPriceByProductID($orderedProductsID);
    $TotalpriceQ = $price * $orderedProductsQty;

    $totalAll = $totalAll + ($price * $orderedProductsQty);
    $i++;
}*/

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


        echo "<h2 align='center'>Order ID: ". $row["orderID"]."</h2>";
        echo "<p align='center'>Date & Time: " . $row["orderdate"] . "</p>";
        echo "<h3>The Pet Food Store Invoice Details</h3>";
        echo "<h5>Shipping Address: " . $row["shipAddress"] . "</h5>";



    //second query
    $sql2 = "select * from orderline where orderID = " . $row["orderID"];

    //run the second query
    $result2 = mysqli_query($conn, $sql2);
        echo " <table class = invoice style='width:90%'>
               <tr class='invoice'>
               <th>Product Name  </th>
               <th>Product Quantity </th>
               <th>Total Price </th>
               </tr>   ";
        $totalAll= 0;
    while ($row2 = $result2->fetch_assoc()) {
        $name = getProductNameByProductID($row2["productID"]);
        $price = getProductPriceByProductID($row2["productID"]);
        $qty1 = $row2["Qty"];
        $totalprice = $price * $qty1;
       // echo "<p>Product Name: " . $name .  " Qty: " . $row2["Qty"] . "</p>";

        echo "<tr>  
               <td align='center'>$name</td>
               <td align='center'>".$row2["Qty"]."</td>
               <td align='center'>$$totalprice</td>
               </tr>               
               ";
        $totalAll = $totalAll + $totalprice;
    }

    echo "</table>";
    echo "<h3>Total Invoice Price: $$totalAll</h3>";
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
}
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

?>

<style>
    .invoice {
        border: 1px solid maroon;
    }
</style>
<?php



