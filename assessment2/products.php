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
    ?>
    <div class="product">
          <img src="<?php echo $row["productImage"];?>">
          <p>$<?php echo $row["pricePerUnit"];?> ea</p>
          <p>Qty: <input class="qty" id="breadQty" type="number">
            <button class = "addBut" id="addBread" onclick="addToCart(this)">Add to Cart</button>
          </p>
        </div>
<?php
}
?>

