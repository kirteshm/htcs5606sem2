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
    <li><a class="active">Home</a></li>
    <li><a href="dogfood.html">Dog Food</a></li>
    <li><a href="catfood.html">Cat Food</a></li>
    <li><a href="aboutus.html">About Us</a></li>
    <li><a href="register.html">Register Now</a></li>
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

        <div class="product">
          <img src="images/dog1.png">
          <p>$35.20 ea</p>
          <p>Qty: <input class="qty" id="breadQty" type="number">
            <button class = "addBut" id="addBread" onclick="addToCart(this)">Add to Cart</button>
          </p>
        </div>
        <div class="product">
          <img src="images/dog2.png">
          <p>$33.90 ea</p>
          <p>Qty: <input class="qty" id="cheeseQty" type="number">
            <button class = "addBut" id="addCheese" onclick="addToCart(this)">Add to Cart</button>
          </p>
        </div>
        <div class="product">
          <img src="images/dog3.png">
          <p>$39.00 ea</p>
          <p>Qty: <input class="qty" id="spreadQty" type="number">
            <button class = "addBut" id="addSpread" onclick="addToCart(this)">Add to Cart</button>
          </p>
        </div>
        <div class="product">
          <img src="images/cat1.jpg">
          <p>$24.50 ea</p>
          <p>Qty: <input class="qty" id="milk1Qty" type="number">
            <button class = "addBut" id="addMilk1" onclick="addToCart(this)" price="24.50">Add to Cart</button>
          </p>
        </div>
        <div class="product">
          <img src="images/cat2.jpg">
          <p>$29.32 ea</p>
          <p>Qty: <input class="qty" id="milk2Qty" type="number">
            <button class = "addBut" id="addMilk2" onclick="addToCart(this)" price="29.32">Add to Cart</button>
          </p>
        </div>
      </td>
      <td id="rightside">
        <p span style="font-size: 30px" style align="font-weight: bolder">Your Cart:</p>
        <div id="cartDiv"></div>
        <button id="showInvoiceBut">Invoice</button>
        <p style="alignment: center"><span style="color:green">Free Delivery for total over $300</span></p>
        <p id="time"></p>

        <script>
          var myVar = setInterval(myTimer, 1000);
          function myTimer() {
            var d = new Date();
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