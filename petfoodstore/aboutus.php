<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- Don't forget your Title here -->
    <title>About</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body onload="moveAd(), moveText()">
<div class="header">
    <img src = "images/logo.png" alt="Petfood Main Image">
    <div id="dogfp"><span id="logoText">About Us!</span></div>
</div>
<div id="nav">
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php include "category.php"?>
        <li><a class="active">About Us</a></li>
        <li><a href="register.php">Register Now</a></li>
    </ul>
</div>
<div id="Main">
    <table id="maintable">
        <tr>
            <td id="leftside">
                <div id="sideAdv">
                    <img src="images/aboutus.jpg" id="sideImage">
                    <p id="text1">Trust Us for your Pet</p>
                    <p id="text2">Thank you</p>
                </div>
            </td>
            <td id="middlecontent" style="width: 80%;">

                <h1>Welcome to The Pet Food Store, <br> Please read about us and our customer testimonials</h1>

                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                    in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit,
                    sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam
                    est, qui dolorem ipsum, quia dolor sit amet, consectetur, adipiscin] velit, sed quia non numquam do
                    eius modi tempora incididunt, ut labore et dolore magnam aliquam quaerat voluptatem.</p>

                <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                    aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit
                    esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla
                    pariatur.</p>

                <h2>Vero eos et accusamus et iusto odio dignissimos ducimus</h2>

                <p>Qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias
                    excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt
                    mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita
                    distinctio. </p>

                <p>Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod
                    maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Qua
                    temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et
                    voluptates repudiandae sint et molestiae non recusandae pondere ad lineam. Itaque earum rerum hic
                    tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut
                    perferendis doloribus asperiores repellat</p>

                <p>Quibus ego assentior, dum modo de iisdem rebus ne Graecos quidem legendos putent. Res vero bonaa
                    verbis electis graviter omateque dictas quis i legat? Nisi qui se plane Graeciun dici velit, ut a 9
                    Scaeiola est praetore salutatus Athenis Albucius. Quem quidem locum cum multa venustate et omm sale
                    idem Lucilius, apud quem praeclare Scaevola.</p>

                <p>Qui autem alia matunt scribi a nobis, aequi esse debent, quod et seripta multa sunt, sic ut plura
                    nemini e nostris, et scribentur fortasse plura si vita suppetet; et tamen qui diligenter haec quae
                    de philosophia Htteris mandamus legere assueverit, iudicabit nulla ad legendum his esse potiora.</p>

                <h3>Tempore intellegi convenire</h3>

                <p>Epicurus autem, in quibus sequitur Democritum, noil fere labitur, Quam- quam utriusque cum mutta non
                    prolx). turn illiid in priniis, quoJ, cum in rerum nalura duo quaerenda sint, ununi quae materia sit
                    ex qua quaeque res cfficiatur, alterum quae vis sit quae quidque efficiat, de materia disserucrunt,
                    vim et causam efficiendi reliquerunt. Sed lioc commune vitiuni; illae Epicur propriae ruinae: censet
                    enim eadem ilia indlvidua e solida corpora ferri deorsum suo pondere ad lineam i hunc naturalem esse
                    omnium corporum motuni.</p>

                <p>Deinde ibidem homo acutus, cam illud occorreret, j omnia deorsum e regione ferrentur et, ut dixi, ad
                    lineam, numquam fore ut atomus altera alteram posset attingere, itaque attulit rem commenticiam.</p>

                <p>Declinare dixit atomum perpaulum, quo nihil posset fieri minus; ita eifici complexiones et
                    copulationes et adhaesiones atomorum inter se, ex quo eificeretur mundus omnesque partes mundi
                    quaeque in eo essent. Quae cum res tota fieta sit piieriliter, turn ne efficit quidem^ quod vult.
                    Nam et ipsa declinatio ad libidinem fiiigitur - ait enim deelinare atomum sine causa, quo nibil
                    turpius physico quam fieri.</p>


            </td>
            <td id="rightside">

                <br><br>
                <?php include "login.php"; ?><br>
                <?php include "category.php"; ?><br><br>
                <li class="button"><a href="showCart.php">Shopping Cart</a></li>
                <?php
                @session_start();
                if (isset($_SESSION["userID"])){
                    ?>
                    <li class="button"><a href="yourOrder.php">My Orders</a></li><br><br>

                    <?php
                }

                ?>
                <h2 align="center" style="color: maroon">Free Delivery for purchase over $300</h2>
            </td>
        </tr>
    </table>
</div>


</body>
<?php include "footer.php"?>

</html>