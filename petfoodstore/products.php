<link rel = "stylesheet" type = "text/css" href = "css/style.css" >
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php
@session_start();

$server = "c584md9egjnm02sk.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbusername = "h1r174kgefa2bwv1";
$dbpassword = "nz1tdqgzvtixcxel";
$dbname = "dry1psur1w11ayhb";

$conn = new mysqli($server, $dbusername, $dbpassword, $dbname);

// take input from category
if (isset($_GET["category"])) {
    //echo "<h4>" . $_GET["category"] . "</h4>";
    $sql = "select * from product where catagory= " . $_GET["category"];
} else {
    $sql = "select * from product";
}

$result = mysqli_query($conn, $sql);

while ($row = $result->fetch_assoc()) {
    //echo $row["id"]; // commented out so the id does not show on the page


    ?>

    <div class="product" style="alignment: top">

        <form class="w3-container w3-card-4 w3-light-grey" action="addToCart.php" method="post">
            <p><?php echo $row["productName"]; ?></p>
            <img src="<?php echo $row["productImage"]; ?>">
            <p>$<?php echo $row["pricePerUnit"]; ?> Each</p>
            <input name="productID" value="<?php echo $row["id"]; ?>" type="hidden">
            <input class="w3-input" name="qty" type="number" placeholder="Qty" min="0" size="8">
            <input class = button type="submit" value="Add to Cart" size="8"><br>

        </form><br>

    </div>

    <?php
}
?>

