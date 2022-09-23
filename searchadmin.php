<?php

function search() {
    require_once './database.php';
    $start=0;
    if (isset($_POST["submit1"]) && $_POST["search"] != "") {
        $searchKeyword = $_POST["search"];
    }
    if (isset($_GET["search"])) {
        $searchKeyword = $_GET["search"];
        $start=$_GET["start"];
    }
    $searchdata = searching($searchKeyword,$start);
    $heros = array();
    foreach ($searchdata as $row) {
        $heros[] = array("id" => $row["ID"], "type" => $row["Choice"], "name" => $row["Name"], "price" => $row["Price"], "qty" => $row["Qty"]);
    }
    $limit=4;
    $totalcount = searchcount($searchKeyword);
    $numberOfPages = (int) ($totalcount / $limit);
    if ($totalcount % $limit != 0) {
        $numberOfPages++;
    }
    ?>
    <table class="table table-striped col-12">
        <tr>
            <th>Item ID</th>
            <th>Watch Type</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php
        foreach ($heros as $hero) {
            echo "<tr>";
            echo "<td>" . $hero["id"] . "</td>";
            echo "<td>" . $hero["type"] . "</td>";
            echo "<td>" . $hero["name"] . "</td>";
            echo "<td>" . $hero["price"] . "</td>";
            echo "<td>" . $hero["qty"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    if ($numberOfPages > 1) {
        echo "<ul class='pagination'>";
        $start = 0;
        $pageNumber = 1;
        for ($i = 0; $i < $numberOfPages; $i++) {
            echo "<li class=page-item ><a class=page-link href='admin.php?search=".urlencode($searchKeyword)."&amp;start=$start' >$pageNumber</a></li>";
            $start+=$limit;
            $pageNumber++;
        }
        echo "</ul>";
    }
    ?>
    <?php
}
?>


