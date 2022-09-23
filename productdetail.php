<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
        <div class="container" style="width: 100%; background-color: #83a888; text-align: center;" id="loca">
            <h5>MEET OUR NEW SIGNATURE WATCH COLLECTION / <font color="white">WORLDWIDE SHIPPING</font></h5>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> User</a>                  
                    </li>

                    <li>
                        <a href="loginform.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
                    </li>


                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-search"></span>Search</a>
                        <ul class="dropdown-menu" role="menu" id="menu">
                            <li>
                                <a class="list" href="#">
                                      <form action="afterlogin.php" method="POST">
                                        <span class="glyphicon glyphicon-search"></span>
                                        <input type="text" name="search" placeholder="Search" class="searchinput">
                                        <input type="submit" name="submit1" value="Search">
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav nav-tabs" role="tablist">      
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <b>SHOP</b> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="list" href="man.html">Man's Watchs</a></li>
                            <li><a class="list" href="women.html">Women's Watchs</a></li>                       
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <b>ABOUT</b> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="list" href="aboutproduct.php">ABOUT PRODUCT</a></li>
                            <li><a class="list" href="aboutus.php">ABOUT US</a></li>
                            </li>                          
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="cart.php" class="dropdown-toggle"><b>VIEW CART</b> <span class="glyphicon glyphicon-shopping-cart" style="font-size: 10px;"></span></a>

                    </li>
                    <center><a href="afterlogin.php"><img src="asdf.png"></a></center>
                </ul>
            </div>
        </nav>
        <?php
        if (isset($_GET["action"])) {
            if ($_GET["action"] == "click") {
                $detailid = $_GET["id"];
                require_once 'database.php';
                $detaildata = searchproductdetail($detailid);
                $heros = array();
                foreach ($detaildata as $row) {
                    $heros[] = array("name" => $row["Name"], "price" => $row["Price"], "qty" => $row["Qty"], "imag" => $row["image"]);
                }
                foreach ($heros as $hero) {
                    echo '<div class="container-fluid">';
                    echo '<div class="col-md-12" style="font-size: 18px; margin-top: 5px;"><img src="' . $hero["imag"] . '" width="400px" height="400px;" align="left"> <br>';
                    if($hero["qty"]==0){
                        echo '<label style="color: green; margin-left:20px;">In stock</label><br>';
                    }
                    else{
                        echo ' <label style="color: green; margin-left:20px;">In stock</label><br>';
                    }
                    echo '<label style=" margin-left:20px;">Only ' .$hero["qty"]. ' left</label> <br>';
                    echo '<label style=" margin-left:20px;">'.$hero["name"].'</label> <br>';
                    echo '<label style=" margin-left:20px; font-size: 30px;">'.$hero["name"].'</label><br>';
                    echo '<label style=" margin-left:20px;">Our elegant products are only of premium quality and </label><br>';
                    echo '<label style=" margin-left:20px;">we hope that you`ll appreciate all best features <br> of our goods. </label><br>';
                    echo '<label style=" margin-left:20px; font-size: 40px;">$'.$hero["price"].'</label><br>';
                    echo ' </div> ';
                }
            }
        }
        ?>
        <div class="container-fluid" style="margin-left: 30px;">
            <div class="row" style="margin-top: 40px; font-size:40px; border-bottom: solid 1px;">
                <div class="col-md-12"><b>More Information</b></div>
            </div>

            <div class="row" style=" font-size: 20px; background-color: #F2F2F2; height: 50px;">
                <div class="col-md-2"><b>Brand</b></div>
                <div class="col-md-10">Fossil</div>
            </div> 

            <div class="row" style=" font-size: 20px; height: 50px;">
                <div class="col-md-2"><b>Manufacturer </b></div>
                <div class="col-md-10">China</div>
            </div> 

            <div class="row" style=" font-size: 20px; background-color: #F2F2F2; height: 50px;">
                <div class="col-md-2"><b>Case Diameter</b></div>
                <div class="col-md-10">45mm to 49mm  </div>
            </div> 

            <div class="row" style=" font-size: 20px; height: 50px;">
                <div class="col-md-2"><b>Features</b></div>
                <div class="col-md-10">Alarm; Calendar; GPS; Shock Resistant; Water Resistant</div>
            </div>

            <div class="row" style=" font-size: 20px; background-color: #F2F2F2; height: 50px;">
                <div class="col-md-2"><b>Display</b></div>
                <div class="col-md-10">Analog  </div>
            </div> 

            <div class="row" style=" font-size: 20px; height: 50px;">
                <div class="col-md-2"><b>Model number</b></div>
                <div class="col-md-10">VF445</div>
            </div>

            <div class="row" style=" font-size: 20px; background-color: #F2F2F2; height: 50px;">
                <div class="col-md-2"><b>Movement</b></div>
                <div class="col-md-10">Mechanical   </div>
            </div> 

            <div class="row" style=" font-size: 20px; height: 50px;">
                <div class="col-md-2"><b>Case material</b></div>
                <div class="col-md-10">Metal</div>
            </div>

            <div class="row" style=" font-size: 20px; background-color: #F2F2F2; height: 50px;">
                <div class="col-md-2"><b>Case Shape</b></div>
                <div class="col-md-10">Tonneau    </div>
            </div> 

            <div class="row" style=" font-size: 20px; height: 50px;">
                <div class="col-md-2"><b>Water Resistance</b></div>
                <div class="col-md-10">yes</div>
            </div>
        </div>
        <div class="rol">
            <img src="five.jpg" width="100%" height="500px">
            <div class="text-block">
                <h4>PARADISE</h4>
                <p>THE GREATEST SERVICES AND SHIPPING</p>
                <p style="text-align: left;">GOOD QUALITY PRODUCT</p>
                <p style="text-align: left;">ANY KIND OF WATCHES YOU CAN FIND</p>
                <br>
                <button class="btn">FIND MORE</button>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <h3 class="h">Information</h3>
                    <br>
                    <p class="p">Contact Us</p>
                    <p class="p">Privacy Policy</p>
                    <p class="p">About Us</p>
                    <p class="p">Customer Service</p>
                    <p class="p">Orders and Returns</p>
                </div>
                <div class="col-xs-4">
                    <h3 class="h">Shipping Terms</h3>
                    <br>
                    <p class="p">Shipping and Return</p>
                    <p class="p">Secure shopping</p>
                    <p class="p">International Shipping</p>
                </div>
                <div class="col-xs-4">
                    <h3 class="h">My Account</h3>
                    <br>
                    <p class="p">Sign In</p>
                    <p class="p">View Cart</p>
                    <p class="p">Help</p>
                </div>
            </div>
        </div>
        <br><br>
        <div class="container" style="background-color: #ECECEC; width: 100%"><h4>&nbsp;&copy; Burmese Book Center 2018 . All Right Reverse. </h4>
            <a href="https://www.instagram.com/">
                <i class="fa fa fa-instagram" style="font-size: 35px; line-height: 40px; display: block; margin-top: -40px; font-weight: bolder; padding-left: 80%;">
                </i></a>
            <a href="https://twitter.com/">
                <i class="fa fa fa-twitter" style="font-size: 35px; line-height: 40px; display: block; margin-top: -40px; font-weight: bolder; padding-left: 87%;">
                </i>
            </a>
            <a href="https://www.facebook.com/">
                <i class="fa fa fa-facebook" style="font-size: 30px; line-height: 40px; display: block; margin-top: -40px; font-weight: bolder; padding-left: 94%;">
                </i>
            </a>
        </div>
    </body>
</html>