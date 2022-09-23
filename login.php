<?php

require_once './database.php';


if (isset($_POST["submit"])) {
    if (empty($_POST["Firstname"]) or empty($_POST["password"])) {
        header("Location:loginform.php?login=empty");
        echo "<script type='text/javascript'>alert('Please Input full data');</script>";
    } else if (isset($_POST["Firstname"]) && isset($_POST["password"])) {
        $username = $_POST["Firstname"];
        $psw = $_POST["password"];
        $c = loginchecking($username, $psw);
        $d = adminchecking($username, $psw);
        foreach ($c as $valid) {
            $valid["Password"];
            $valid["Username"];
        }
        foreach ($d as $valids) {
            $valids["Password"];
            $valids["Name"];
        }
        if ($valid["Password"] == $psw && $valid["Username"] == $username) {
            echo '<script>alert("Login successful")</script>';
             echo '<script >window.location="afterlogin.php"</script>';
        } else if ($valids["Password"] == $psw && $valids["Name"] == $username) {
            adminpage();
            echo '<script>alert("Login successful")</script>';
            echo '<script >window.location="admin.php"</script>';
        } else {
            header("Location:loginform.php?login=error");
        }
    }
}

function adminpage() {
    header("Location:admin.php");
}

?>
