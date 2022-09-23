<?php

function aftershow() {
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
            echo '<form method="POST" action="afterlogin.php?action=add&id=' . $hero['id'] . '">';
            echo '<a href="productdetail.php?action=click&id='.$hero['id'].'"><img src="' . $hero['Image'] . '" class="three"/></a>';
            echo'<input type="number" name="quantity" value="1" style="text-align: center; margin-left: 50px; margin-top: 5px;">';
            echo '<div class="overlay" id="anima">';
            ?>
            <input type="hidden" name="hidden-name" value="<?php echo $hero['name']; ?>">
            <input type="hidden" name="hidden-price" value="<?php echo $hero['price']; ?>">
            <?php
            echo '<input type="submit" name="add-to-cart" value="ADD TO CART" class="anima">';
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
        }
        ?>
    </div>
    <?php
}
?>

