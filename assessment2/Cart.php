<?php

@session_start();

$orderedProductsIDs = $_SESSION["orderedProductIds"];
$orderedProductsQtys = $_SESSION["orderedProductQtys"];

$i = 0;
while ($i<sizeof($orderedProductsIDs)){

    $orderedProductsIDs = $orderedProductsIDs[$i];
    $orderedProductsQtys = $orderedProductsQtys[$i];
    echo "<p>ID: $orderedProductsIDs and Qty: $orderedProductsQtys</p>";
    $i++;
}

function getProductNameByProductID(){

}