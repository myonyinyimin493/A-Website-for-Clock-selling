<?php

function show() {
    require_once 'database.php';
    $showuser = usershow();
    $heros = array();
    foreach ($showuser as $row) {
        $heros[] = array("id" => $row["ID"], "type" => $row["Choice"], "name" => $row["Name"], "price" => $row["Price"], "qty" => $row["Qty"], "Image" => $row["image"]);
    }
    ?>
    <div class="row">
        <?php
        foreach ($heros as $hero) {
            echo '<div class="col-xs-3">';
            echo '<form method="POST" action="loginform.php">';
            echo '<img src="' .$hero['Image'] . '" class="three"/>';
            echo '<div class="overlay" id="anima">';
            echo '<input type="submit" name="submit3" value="ADD TO CART" class="anima">';
            echo'</div>';
            echo '<br />';
            echo '<br />';
            echo'<p>';
            echo $hero['name'];
            echo'</p>';
            echo'<p>';
            echo '$';
            echo $hero['price'];
            echo'</p>';
            echo '</form>';
            echo '</div>';
            if(isset($_POST["submit3"])){
                echo '<script>alert("Please Login First")</script>';
                echo '<script>window.location="loginform.php"</script>';
            }
        }
        ?>
    </div>
    <?php
}
?>

