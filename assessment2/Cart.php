<?php

@session_start();

$orderedProductsIDs = $_SESSION["orderedProductIds"];
$orderedProductsQtys = $_SESSION["orderedProductQtys"];

$i = 0;
while ($i<sizeof($orderedProductsIDs)){

    $orderedProductsID = $orderedProductsIDs[$i];
    $orderedProductsQty = $orderedProductsQtys[$i];
    echo "<p>ID: $orderedProductsID and Qty: $orderedProductsQty</p>";
    $i++;
}

function getProductNameByProductID(){

}