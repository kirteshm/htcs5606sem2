<?php

$server = "c584md9egjnm02sk.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbusername = "h1r174kgefa2bwv1";
$dbpassword = "nz1tdqgzvtixcxel";
$dbname = "dry1psur1w11ayhb";

$conn = new mysqli($server, $dbusername, $dbpassword, $dbname);

$sql = "select * from product";

$result = mysqli_query($conn, $sql);

while ($row = $result->fetch_assoc()){
    echo $row["id"];
    echo $row["productName"];
}

