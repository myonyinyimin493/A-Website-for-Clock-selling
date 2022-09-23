<?php

function usersearchshow() {
    require_once 'database.php';
    $start=0;
    if (isset($_POST["submit1"]) && $_POST["search"] != "") {
        $searchKeyword = $_POST["search"];
    }
    if (isset($_GET["search"])) {
        $searchKeyword = $_GET["search"];
        $start=$_GET["start"];
    }
    $searchuser = searchforusershow($searchKeyword, $start);
    $heros = array();
    foreach ($searchuser as $row) {
        $heros[] = array("id" => $row["ID"], "type" => $row["Choice"], "name" => $row["Name"], "price" => $row["Price"], "qty" => $row["Qty"], "Image" => $row["image"]);
    }
    $limit = 8;
    $totalcount = searchforusershowcount($searchKeyword);
    $numberOfPages = (int) ($totalcount / $limit);
    if ($totalcount % $limit != 0) {
        $numberOfPages++;
    }
    ?>
    <div class="row">
        <?php
        foreach ($heros as $hero) {
            echo '<div class="col-xs-3">';
            echo '<form method="POST" action="loginform.php">';
            echo '<a href="productdetail.php?action=click&id='.$hero['id'].'"><img src="' . $hero['Image'] . '" class="three"/></a>';
             echo'<input type="number" name="quantity"  value="1" style="text-align: center; margin-left: 50px; margin-top: 5px;">';
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
        }
        ?>
    </div>
    <?php
    if ($numberOfPages > 1) {
        echo "<ul class='pagination'>";
        $start = 0;
        $pageNumber = 1;
        for ($i = 0; $i < $numberOfPages; $i++) {
            echo "<li class=page-item ><a class=page-link href='afterlogin.php?search=" . urlencode($searchKeyword) . "&amp;start=$start' >$pageNumber</a></li>";
            $start+=$limit;
            $pageNumber++;
        }
        echo "</ul>";
    }
    ?>
    <?php
}
?>

