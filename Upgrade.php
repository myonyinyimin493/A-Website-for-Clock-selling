<?php

require_once './database.php';

//    if (isset($_POST["ItemID"])) {
//        $id = $_POST["ItemID"];
//        $back = defaultsearching($id);
//        foreach ($back as $value) {
//            $ItemName = $value["Name"];
//            $ItemQty = $value["Qty"];
//            $price = $value["Price"];
//        }
//    }

require_once './database.php';
if (isset($_POST["submit"])) {
    $file = $_FILES['image']['tmp_name'];
    if (empty($_POST["ItemID"])or empty($_POST["ItemName"]) or empty($_POST["ItemQty"]) or empty($_POST["price"]) or empty($file)or empty($_POST["choice"])) {
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
            $id =$_POST["ItemID"];
            if (!filter_var($id, FILTER_VALIDATE_INT) || !filter_var($quantity, FILTER_VALIDATE_INT) || !filter_var($p, FILTER_VALIDATE_INT) || filter_var($quantity, FILTER_VALIDATE_INT) <= 0 || filter_var($p, FILTER_VALIDATE_INT) <= 0) {
            header("Location:admin.php?insert=error1");
            } else {
                $id =(int)($_POST["ItemID"]);
                $Name = $_POST["ItemName"];
                $quantity =(int)( $_POST["ItemQty"]);
                $p = (int)($_POST["price"]);
                $ch  = $_POST["choice"];

//                list($width, $height) = getimagesize($file);
//                if ($width > "900" || $height > "900") {
//                    echo "Error : image size must be 180 x 70 pixels.";
//                } else {
                    updatingdata($id,$ch,$Name, $p, $quantity, $image_name);
                    header("Location:admin.php?insert=bobo");
//                }
            }
        }
    }
}

?>
