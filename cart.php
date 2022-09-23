<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($value["IID"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$key]);
                echo '<script>alert("Item Removed.")</script>';
                echo '<script >window.location="cart.php"</script>';
            }
        }
    }
}
?>


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

        <!-- checkout modal -->
        <div class="modal fade" id="Modal" role="dialog" align="center">
            <div class="modal-dialog">

                <div class="modal-content" >
                    <div class="modal-header" style="background-color:#83a888; ">

                        <h4 class="modal-title" ><b>Check Out Process</b></h4>
                    </div>
                    <form action="cart.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body" style="background-color:#CAD2c5;">
                            <input type="text"  placeholder="Type Name" name="name" />
                            <br><br>
                            <input type="text" name="address" placeholder="Street Address" /><br><br>
                            <input type="text" name="Ph" placeholder="Phone" /><br><br>
                            <input type="email" name="email" placeholder="Email" />
                        </div>
                        <div class="modal-footer" style="background-color:#83a888;">
                            <input type="submit" value="Payment" name="checkout">
                            <input type="submit" value="Close" data-dismiss="modal">
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- checkout modal -->
        <div class="container" style="width: 100%; background-color: #83a888; text-align: center;" id="loca">
            <h5>MEET OUR NEW SIGNATURE WATCH COLLECTION / <font color="white">WORLDWIDE SHIPPING</font></h5>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a href="afterlogin.php"><span class="glyphicon glyphicon-user"></span> User</a>
                    </li>

                    <li>
                        <a href="loginform.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>

                <ul class="nav nav-tabs" role="tablist">      
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <b>SHOP</b> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="list" href="man.php">Man's Watchs</a></li>
                            <li><a class="list" href="women.php">Women's Watchs</a></li>        
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <b>ABOUT</b> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="list" href="aboutproduct.php">ABOUT PRODUCT</a></li>
                            <li><a class="list" href="aboutus.php">ABOUT US</a></li>                      
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="cart.php" class="dropdown-toggle"><b>VIEW CART</b> <span class="glyphicon glyphicon-shopping-cart" style="font-size: 10px;"></span></a>

                    </li>
                    <center><a href="afterlogin.php"><img src="asdf.png"></a></center>
                </ul>
            </div>
        </nav>
        <div class="container-fluid" style="width: 100%;">
            <div class="row" style="border-bottom: solid 1px;">
                <div class="col-md-6" style="font-size: 18px; margin-top: -10px;"><b>Shopping Cart</b></div>
            </div> 
            <!--  <div class="row" style="border-bottom: solid 1px;">-->
            <table class="table table-striped col-12">
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                <?php
                if (!empty($_SESSION["shopping_cart"])) {
                    $total = 0;
                    foreach ($_SESSION["shopping_cart"] as $key => $value) {
                        echo "<tr>";
                        echo "<td>" . $value["name"] . "</td>";
                        echo "<td>$" . $value["pri"] . "</td>";
                        echo "<td>" . $value["qty"] . "</td>";
                        echo "<td>$" . number_format($value["qty"] * $value["pri"], 2) . "</td>";
                        echo '<td><a href="cart.php?action=delete&id=' . $value["IID"] . '" style="text-decoration: none;"><span class="text-danger">DELETE</span></a></td>';
                        echo "</tr>";
                        $total = $total + ($value["qty"] * $value["pri"]);
                    }
                }
                ?>
            </table>
            <div class="row" style="border-bottom: solid 1px; height: 40px;">
                <div class="col-md-6" align="left" style="margin-top: 5px;">
                    <button data-toggle="modal" data-target="#Modal">Check Out</button>
                </div>
                <div class="col-md-6" align="right" style="margin-top: 10px;">$ <?php echo number_format($total, 2); ?></div>
            </div> 
            <?php
            if (isset($_POST["checkout"])) {
                if (empty($_POST["name"]) or empty($_POST["address"]) or empty($_POST["Ph"]) or empty($_POST["email"])) {
                    echo "<script type='text/javascript'>alert('Please fill the data completely');</script>";
                } elseif (empty($_SESSION["shopping_cart"])) {
                    echo "<script type='text/javascript'>alert('Please select items first!');</script>";
                } else {
                    $buyerphone = $_POST["Ph"];
                    if (!preg_match("/^\d{11}+$/", $buyerphone)) {
                        echo "<script type='text/javascript'>alert('Incorrect PH number and number will be 11');</script>";
                    } else {
                        $buyername = $_POST["name"];
                        $buyeradd = $_POST["address"];
                        $buyeremail = $_POST["email"];
                        $buyerphone = $_POST["Ph"];
                        foreach ($_SESSION["shopping_cart"] as $key => $value) {
                            $n = $value["name"];
                            $pr = (int) $value["pri"];
                            $q = (int) $value["qty"];
                            require_once 'database.php';
                            if ($q <= 0) {
                                echo '<script>alert("Item quantity will not be zore or less than zero.")</script>';
                            } else {
                                 orderinsert($buyername, $buyeradd, $buyeremail, $buyerphone, $n, $pr, $q);
                            echo "<script type='text/javascript'>alert('Order successful.');</script>";
                            $i = $value["IID"];
                            $dataoutput = itemoutpingforcheckout($i);
                            foreach ($dataoutput as $output) {
                                $ii = $output["ID"];
                                $qq = $output["Qty"];
                                $minus = $qq - $q;
                                updatingqty($ii, $minus);
                            }
                            }
                        }
                        if (isset($_SESSION["shopping_cart"])) {
                            session_destroy();
                            echo '<script >window.location="cart.php"</script>';
                        }
                    }
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