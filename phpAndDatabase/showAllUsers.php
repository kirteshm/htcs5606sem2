<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show All Users</title>
</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Address</th>
        <th>Phone</th>
    </tr>

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
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["firstname"]."</td>";
        echo "<td>".$row["lastname"]."</td>";
        echo "<td>".$row["username"]."</td>";
        echo "<td>".$row["password"]."</td>";
        echo "<td>".$row["address"]."</td>";
        echo "<td>".$row["phoneNumber"]."</td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>