<?php

require_once './database.php';
if (isset($_POST["submit"])) {
    $file = $_FILES['image']['tmp_name'];
    if (empty($_POST["ItemName"]) or empty($_POST["ItemQty"]) or empty($_POST["price"]) or empty($file)or empty($_POST["choice"])) {
        header("Location:admin.php?insert=error");
    } else {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_size = getimagesize($_FILES['image']['tmp_name']);
        $image_name= $_FILES['image']['name'];
        if ($image_size == FALSE) {
            header("Location:admin.php?insert=error2");
        } else {
            $quantity = $_POST["ItemQty"];
            $p = $_POST["price"];
            if (!filter_var($quantity, FILTER_VALIDATE_INT) || !filter_var($p, FILTER_VALIDATE_INT) || filter_var($quantity, FILTER_VALIDATE_INT) <= 0 || filter_var($p, FILTER_VALIDATE_INT) <= 0) {
                header("Location:admin.php?insert=error1");
            } else {
                $Name = $_POST["ItemName"];
                $quantity = $_POST["ItemQty"];
                $p = $_POST["price"];
                $ch  = $_POST["choice"];

                
                    iteminsert($ch,$Name, $p, $quantity, $image_name);
                    header("Location:admin.php?insert=success");
                
            }
        }
    }
}
?>

