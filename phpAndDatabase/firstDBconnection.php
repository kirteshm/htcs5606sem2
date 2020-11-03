<?php

// Create a database connection

    $server = "c584md9egjnm02sk.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $dbusername = "h1r174kgefa2bwv1";
    $dbpassword = "nz1tdqgzvtixcxel";
    $dbname = "dry1psur1w11ayhb";

    $conn = new mysqli($server, $dbusername, $dbpassword, $dbname);

    if($conn->error){
        echo $conn->error;
    }
    else{
        echo "connected";
    }

// write a query

    $sql = "select * from users";

// execute the query

    $result = mysqli_query($conn, $sql);

// show my result

    while ($row = $result->fetch_assoc()){
        echo $row["firstname"];
    }