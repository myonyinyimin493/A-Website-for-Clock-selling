<?php

require_once './database.php';
if (isset($_POST["submit"])) {
    if (empty($_POST["ItemID"])) {
        header("Location:admin.php?insert=error");
    } else {
        $deleteid = $_POST["ItemID"];
        if (!filter_var($deleteid, FILTER_VALIDATE_INT)) {
            header("Location:admin.php?insert=error1");
        } else {
            $deleteid;
            deletingdata($deleteid);
            echo '<script>alert("Item are successfully deleted")</script>';
            echo '<script >window.location="admin.php"</script>';
        }
    }
}
?>

