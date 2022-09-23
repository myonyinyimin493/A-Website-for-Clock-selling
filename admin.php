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
                        <a href="admin.php"><span class="glyphicon glyphicon-user"></span> Admin</a>

                        <!-- update, delete, add process -->
                        <div class="modal fade" id="mModal" role="dialog" align="center">
                            <div class="modal-dialog">
                                <form action="upgrade.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-content" >
                                        <div class="modal-header" style="background-color:#83a888; ">

                                            <h4 class="modal-title" ><b>UPDATE DATA</b></h4>
                                        </div>
                                        <div class="modal-body" style="background-color:#CAD2c5;">

                                            <input type="text"  placeholder="Item ID" name="ItemID" />
                                            <br><br>
                                            <input type="text" name="ItemName" placeholder="Item Name" value="<?php echo $ItemName; ?>"/>
                                            <br><br>
                                            <input type="text" name="ItemQty" placeholder="Price" value="<?php echo $ItemQty; ?>" />
                                            <br><br>
                                            <input type="text" name="price" placeholder="Item Qty" value="<?php echo $price; ?>"/>
                                            <br><br>
                                            <input type="file" name="image" class="im"/>
                                            <br>
                                            <input type="radio" name="choice" value="Male" >
                                            Man
                                            <input type="radio" name="choice" value="Female" >
                                            Women
                                            <input type="radio" name="choice" value="Male" >
                                            Luxury
                                            <input type="radio" name="choice" value="Female" >
                                            Sport
                                            <input type="radio" name="choice" value="Male" >
                                            Technique
                                            <input type="radio" name="choice" value="Female" >
                                            Discount
                                        </div>
                                        <div class="modal-footer" style="background-color:#83a888;">
                                            <input type="submit" value="Upgrade" name="submit">
                                            <input type="submit" value="Close" data-dismiss="modal">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="modal fade" id="addModal" role="dialog" align="center">
                            <div class="modal-dialog">
                                <form action="insertitem.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-content" >
                                        <div class="modal-header" style="background-color:#83a888; ">

                                            <h4 class="modal-title" ><b>ADD DATA</b></h4>
                                        </div>
                                        <div class="modal-body" style="background-color:#CAD2c5;">
                                            <input type="text" name="ItemName" placeholder="Item Name" />
                                            <br><br>
                                            <input type="text" name="ItemQty" placeholder="Price" />
                                            <br><br>
                                            <input type="text" name="price" placeholder="Item Qty" />
                                            <br><br>
                                            <input type="file" name="image" class="im"/>
                                            <br>
                                            <input type="radio" name="choice" value="Male" >
                                            Man
                                            <input type="radio" name="choice" value="Female" >
                                            Women
                                            <input type="radio" name="choice" value="Male" >
                                            Luxury
                                            <input type="radio" name="choice" value="Female" >
                                            Sport
                                            <input type="radio" name="choice" value="Male" >
                                            Technique
                                            <input type="radio" name="choice" value="Female" >
                                            Discount
                                        </div>
                                        <div class="modal-footer" style="background-color:#83a888;">
                                            <input type="submit" value="Add" name="submit">
                                            <input type="submit" value="Close" data-dismiss="modal">
                                        </div>
                                    </div>
                                </form>
                                <?php
                                $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                if (strpos($fullurl, "insert=error") == true) {
                                    echo "<script type='text/javascript'>alert('Please Input full data');</script>";
                                } else if (strpos($fullurl, "insert=error2") == true) {
                                    echo "<script type='text/javascript'>alert('That's not an image');</script>";
                                } else if (strpos($fullurl, "insert=error1") == true) {
                                    echo "<script type='text/javascript'>alert('Please input valid data');</script>";
                                }  else if (strpos($fullurl, "insert=success") == true) {
                                    echo "<script type='text/javascript'>alert('Data are successfully inserted');</script>";
                                } else if (strpos($fullurl, "insert=bobo") == true) {
                                    echo "<script type='text/javascript'>alert('Data are successfully Update');</script>";
                                } else if (strpos($fullurl, "insert=success2") == true) {
                                    echo "<script type='text/javascript'>alert('Data are successfully Delete');</script>";
                                }
                                ?>

                            </div>
                        </div>

                        <div class="modal fade" id="deleteModal" role="dialog" align="center">
                            <div class="modal-dialog">
                                <form action="delete.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-content" >
                                        <div class="modal-header" style="background-color:#83a888; ">

                                            <h4 class="modal-title" ><b>DELETE DATA</b></h4>
                                        </div>
                                        <div class="modal-body" style="background-color:#CAD2c5;">
                                            <input type="text"  placeholder="Item ID" name="ItemID" />
                                        </div>
                                        <div class="modal-footer" style="background-color:#83a888;">
                                            <input type="submit" value="Delete" name="submit">
                                            <input type="submit" value="Close" data-dismiss="modal">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- update, delete, add process end -->
                        <!-- sign up -->
                        <div class="modal fade" id="myModal" role="dialog" align="center">
                            <div class="modal-dialog">

                                <div class="modal-content" >
                                    <div class="modal-header" style="background-color:#83a888; ">

                                        <h4 class="modal-title" ><b>Register</b></h4>
                                    </div>
                                    <form action="adminregister.php" method="POST">
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
                                            <input type="submit" value="Close" data-dismiss="modal">
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
                        <!-- sign up -->
                    </li>

                    <li>
                        <a href="loginform.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
                    </li>



                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-search"></span>Search</a>
                        <ul class="dropdown-menu" role="menu" id="menu">
                            <li>
                                <a class="list" href="#">
                                    <form action="admin.php" method="POST">
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
                            <b>My Account</b> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="list" href="#" data-toggle="modal" data-target="#myModal">Sign In</a></li>                       
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <b>Processes</b> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="list" href="#" data-toggle="modal" data-target="#addModal">ADD ITEM</a></li>
                            <li><a class="list" href="#" data-toggle="modal" data-target="#deleteModal">DELETE ITEM</a></li>
                            <li><a class="list" href="#" data-toggle="modal" data-target="#mModal">UPDATE ITEM</a>
                            <li><a class="list" href="admin.php?action=account">VIEW USER</a></li>
                            <li><a class="list" href="admin.php?action=order">VIEW ORDER</a></li>
                    </li>                        
                </ul>
                </li>
                <center><a href="afterlogin.php"><img src="asdf.png"></a></center>
                </ul>
            </div>
        </nav>
        <div class="container-fluid" style="margin-left: 20px; margin-right: 20px;">
            <div class="row">
                <div class="col-xs-12" style="background-color: #F0F3F5;font-size: 20px;"><span class="glyphicon glyphicon-th-list"></span>Your Search Data</div>
            </div>
            <?php
            if (isset($_POST["submit1"]) or ( $_POST["search"] != "")) {
                $start = 0;
                require_once './searchadmin.php';
                search();
            } elseif (isset($_GET["search"])) {
                require_once './searchadmin.php';
                search();
            } else {
                if (isset($_GET["action"])) {
                    if ($_GET["action"] == "order") {
                        require_once 'ordershow.php';
                        Displayorder();
                    } else if ($_GET["action"] == "account") {
                        require_once 'customeraccountshow.php';
                        Displaycustomeraccount();
                    }
                } else {
                    require_once './viewadmin.php';
                    Displayitem();
                }
            }
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