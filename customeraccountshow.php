<?php
require_once './database.php';

function Displaycustomeraccount() {
    $result = defaultcustomershowing();
    $heros = array();
        foreach ($result as $row) {
        $heros[] = array("name" => $row["Username"], "Password" => $row["Password"]);
    }
 
    ?>
    <table class="table table-striped col-12">
        <tr>
            <th>User Name</th>
            <th>User Password</th>
        </tr>
        <?php
        foreach ($heros as $hero) {
            echo "<tr>";
            echo "<td>" . $hero["name"] . "</td>";
            echo "<td>" . $hero["Password"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
}
?>

