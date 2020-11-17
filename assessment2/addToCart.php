<?php

//take the post from any product
$productID = $_POST["productID"];
$qty = $_POST["qty"];

// start a session
@session_start();

//get or set session variable

// for else --> if there are no ordered products list in my session, will create one

if (isset($_SESSION["orderedProductIds"])){
    //if there is something in our shopping cart

    $orderedProductsIDs = $_SESSION["orderedProductIds"];
    $orderedProductsQtys = $_SESSION["orderedProductQtys"];

    if (in_array($productID, $orderedProductsIDs)){
        $index = array_search($productID, $orderedProductsIDs);
        $orderedProductsQtys[$index] += $qty;
    }else{

        array_push($orderedProductsIDs, $productID);
        array_push($orderedProductsQtys, $qty);
    }
}
else{
    // if nothing in our shopping cart
    $orderedProductsIDs = [];
    $orderedProductsQtys = [];

    array_push($orderedProductsIDs, $productID); // append one at the bottom of the array to the bottom of the table
    array_push($orderedProductsQtys, $qty);
}

// Put the new ordered product list back to session variable.
$_SESSION["orderedProductIds"] = $orderedProductsIDs;
$_SESSION["orderedProductQtys"] = $orderedProductsQtys;

//go back to previous page code once added

header('location: ' . $_SERVER['HTTP_REFERER']);