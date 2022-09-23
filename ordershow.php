<?php
require_once './database.php';

function Displayorder() {
    $result = defaultordershowing();
    $heros = array();
        foreach ($result as $row) {
        $heros[] = array("uname" => $row["Username"], "uaddress" => $row["Address"], "uemail" => $row["Useremail"], "uphone" => $row["Userphone"], "Itemname" => $row["Iname"], "Itemprice" => $row["Iprice"], "Itemqty" => $row["Iqty"]);
    }
 
    ?>
    <table class="table table-striped col-12">
        <tr>
            <th>User Name</th>
            <th>User Address</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Item Name</th>
            <th>Item Price</th>
            <th>Item Quantity</th>
        </tr>
        <?php
        foreach ($heros as $hero) {
            echo "<tr>";
            echo "<td>" . $hero["uname"] . "</td>";
            echo "<td>" . $hero["uaddress"] . "</td>";
            echo "<td>" . $hero["uemail"] . "</td>";
            echo "<td>" . $hero["uphone"] . "</td>";
            echo "<td>" . $hero["Itemname"] . "</td>";
            echo "<td>" . $hero["Itemprice"] . "</td>";
            echo "<td>" . $hero["Itemqty"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
}
?>

