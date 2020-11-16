<?php


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
    <div class="product">
        <p><?php echo $row["productName"]; ?></p>
        <img src="<?php echo $row["productImage"]; ?>">
        <p>$<?php echo $row["pricePerUnit"]; ?> ea</p>
        <form action="" method="post">
            <input name="productID" value="<?php echo $row["id"]; ?>" type="hidden">
            <input name="qty" type="number" placeholder="Quantity" min="0">
            <input type="submit" value="Add to Cart">

        </form>

    </div>
    <?php
}
?>

