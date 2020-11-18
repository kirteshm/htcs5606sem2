<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>The Pet Food Store</title>
  <link rel = "stylesheet" type = "text/css" href = "css/style.css" >
  <script src="js/script.js"></script>
</head>
<body onload="moveAd(), moveText(), invoice()">
    <div class = "header">
        <img src = "images/mainimage.jpg" alt="Petfood Main Image">
        <div class="logo"><img src="images/logo.png" alt="Petfood Logo"></div>
      <div id="dogfp"><span id="logoText">Welcome to the Pet Food Store</span></div>
    </div>

<div id = "nav">
  <ul>
    <li><a class="active" href="index.php">Home</a></li>
    <?php include "category.php";?>
    <li><a href="aboutus.html">About Us</a></li>
    <li><a href="registernow.html">Register Now</a></li>
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
          <div id="header">
              <?php include "products.php"; ?>
          </div>

      </td>
      <td id="rightside">

        <div id="cartDiv"></div>

          <?php include "login.php"; ?><br>
          <?php include "category.php"; ?>
          <li><a href="Cart.php">Shopping Cart</a></li>
          <?php
          @session_start();
            if (isset($_SESSION["userID"])){
              ?>
          <li><a href="viewOrder.php">My Orders</a></li>
          <?php
          }
          ?>

        <p id="time"></p>
          <p span style="font-size: 20px" style align="font-weight: bolder">Your Cart:</p>
<!--          <button id="showInvoiceBut">Invoice</button>-->
          <p style="alignment: center"><span style="color:green">Free Delivery for total over $300</span></p>

        <script>
          var myVar = setInterval(myTimer, 1000);
          function myTimer() {
            d = new Date();
            document.getElementById("time").innerHTML = "Current Local Time " + d.toLocaleTimeString();
          }
        </script>
      </td>
    </tr>
  </table>
</div>

<!-- The inVoice Page -->
<div id="voicePage" class="voice">

  <!-- Modal content -->
  <div id="voice-content">
    <span class="close">&times;</span>
    <p>Invoice <span style="font-weight: bold">Total</span></p>
  </div>

</div>

<div id="footer">&copy; The Pet Food Shop Limited</div>

</body>
</html>