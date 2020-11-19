<?php

//1. connect to database
$server = "c584md9egjnm02sk.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbusername = "h1r174kgefa2bwv1";
$dbpassword = "nz1tdqgzvtixcxel";
$dbname = "dry1psur1w11ayhb";

$conn = new mysqli($server, $dbusername, $dbpassword, $dbname);

//2. Create the Query
$sql = "select * from catagory";

 //
//3. Run the Query on the connection

$result = mysqli_query($conn, $sql);

//4. show the result
while ($row = $result->fetch_assoc()){
    ?>
<li><a href="index.php?category= <? echo $row["id"]; ?>"><?php echo $row["name"]; ?></a></li>
<?php
}
