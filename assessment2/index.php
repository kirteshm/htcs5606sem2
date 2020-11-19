<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>The Pet Food Store</title>
  <link rel = "stylesheet" type = "text/css" href = "css/style.css" >
  <script src="js/script.js"></script>
</head>
<body onload="moveAd(), moveText()">
    <div class = "header">
        <img src = "images/mainimage.jpg" alt="Petfood Main Image">
        <div class="logo"><img src="images/logo.png" alt="Petfood Logo"></div>
      <div id="dogfp"><span id="logoText">Welcome to the Pet Food Store</span></div>
    </div>

<div id = "nav">
  <ul>
    <li><a class="active" href="index.php">Home</a></li>
    <?php include "category.php";?>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="register.php">Register Now</a></li>
  </ul>
</div>
<div id = "Main">
  <table id = "maintable">
    <tr>
      <td id="leftside">
        <div id ="sideAdv">
          <img src = "images/food2.jpg" id="sideImage">
          <p id = "text1">Welcome</p>
          <p id = "text2">The Pet food Shop</p>
        </div>
      </td>
      <td id="middlecontent">
          <div>
              <?php include "products.php"; ?>
          </div>

      </td>
      <td id="rightside">

              <?php include "login.php"; ?><br>
              <?php include "category.php"; ?><br><br>
              <li><a href="showCart.php">Shopping Cart</a></li>

          <?php
          @session_start();
            if (isset($_SESSION["userID"])){
              ?>
          <li><a href="yourOrder.php">My Orders</a></li>
          <?php
          }
          ?>

        <p id="time"></p>
          <h3 style="alignment: center"><span style="color:green">Free Delivery for purchases over $300</span></h3>


      </td>
    </tr>
  </table>
</div>



</body>
<div id="footer">&copy; The Pet Food Shop Limited</div>
</html>