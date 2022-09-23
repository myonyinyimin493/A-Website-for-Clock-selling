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
                        <a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Sign Up</a>


                        <div class="modal fade" id="myModal" role="dialog" align="center">
                            <div class="modal-dialog">

                                <div class="modal-content" >
                                    <div class="modal-header" style="background-color:#83a888; ">

                                        <h4 class="modal-title" ><b>Register</b></h4>
                                    </div>
                                    <form action="register.php" method="POST">
                                        <div class="modal-body" style="background-color:#CAD2c5;">
                                            <input type="text"  placeholder="Type Name" name="Firstname" />
                                            <br><br>
                                            <input type="password" name="password" placeholder="Type Password" />
                                            <br><br>
                                            <input type="radio" name="choice" value="Male" >
                                            Male
                                            <input type="radio" name="choice" value="Female" >
                                            Female
                                            <br><br>
                                            <input type="Email" placeholder="Type Email" name="email">
                                        </div>
                                        <div class="modal-footer" style="background-color:#83a888;">
                                            <input type="submit" value="Register" name="submit">
                                            <input type="Submit" value="Close" data-dismiss="modal">
                                        </div>
                                    </form>
                                    <?php
                                    $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                    if (strpos($fullurl, "signup=empty") == true) {
                                        echo "<script type='text/javascript'>alert('Please Input full data');</script>";
                                    } else if (strpos($fullurl, "signup=error") == true) {
                                        echo "<script type='text/javascript'>alert('Username and Password is already exiting');</script>";
                                    } else if (strpos($fullurl, "signup=success") == true) {
                                        echo "<script type='text/javascript'>alert('Register successful');</script>";
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="#" data-toggle="modal" data-target="#Modal"><span class="glyphicon glyphicon-log-in"></span> Login</a>

                        <div class="modal fade" id="Modal" role="dialog" align="center">
                            <div class="modal-dialog">

                                <div class="modal-content" >
                                    <div class="modal-header" style="background-color:#83a888;">

                                        <h4 class="modal-title" ><b>Log In</b></h4>
                                    </div>

                                    <div class="modal-body" style="background-color:#CAD2c5;">
                                        <form action="login.php" method="POST">
                                            <input type="text"  placeholder="Type Name" name="Firstname" />
                                            <br><br>
                                            <input type="password" name="password" placeholder="Type Password" />
                                            <br><br>
                                            <input type="submit" value="Login" name="submit">
                                            <input type="Submit" value="Close" data-dismiss="modal">
                                        </form>
                                        <?php
                                        $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                        if (strpos($fullurl, "login=empty") == true) {
                                            echo "<script type='text/javascript'>alert('Please Input full data!');</script>";
                                        } else if (strpos($fullurl, "login=error") == true) {
                                            echo "<script type='text/javascript'>alert('Username and Password is incorrect!');</script>";
                                        }
                                        ?>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </li>


                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-search"></span>Search</a>
                        <ul class="dropdown-menu" role="menu" id="menu">
                            <li>
                                <a class="list" href="#">
                                    <form action="loginform.php" method="POST">
                                        <span class="glyphicon glyphicon-search"></span>
                                        <input type="text" name="" placeholder="Search" class="searchinput">
                                        <input type="submit" name="sub" value="Search">
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
                            <li><a class="list" href="loginform.php?action">Man's Watchs</a></li>
                            <li><a class="list" href="loginform.php?action">Women's Watchs</a></li>
                        </ul>
                    </li>
                    <?php
                    if (isset($_GET["action"])) {
                        echo '<script>alert("Login First.")</script>';
                    }
                    ?>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <b>ABOUT</b> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="list" href="loginform.php?action">ABOUT PRODUCT</a></li>
                            <li><a class="list" href="loginform.php?action">ABOUT US</a></li>                                                  
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="loginform.php?action" class="dropdown-toggle"><b>VIEW CART</b> <span class="glyphicon glyphicon-shopping-cart" style="font-size: 10px;"></span></a>

                    </li>
                    <center><a href="loginform.php"><img src="asdf.png"></a></center>
                </ul>
            </div>
        </nav>
        <div class="rol">
            <img src="rolex.jpg" width="100%" class="rol">
        </div>
        <div class="container-fluid" align="center">
            <img src="brand1.png" height="100px" width="200px" class="brand">
            <img src="brand2.png" height="100px" width="200px" class="brand">
            <img src="brand3.png" height="150px" width="200px" class="brand">
            <img src="brand4.png" height="100px" width="200px" class="brand">
            <img src="brand5.jpg" height="100px" width="200px" class="brand">
        </div>
        <div class="grid-container">
            <div><img src="twophoto.jpg" class="one"></div>
            <div><img src="citizen.jpg" class="two"></div>
        </div>
        <div class="container">
            <h1 class="heading">NEW COLLECTIONS</h1><br />
            <?php
            require_once 'usershow.php';
            show();
            ?>

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