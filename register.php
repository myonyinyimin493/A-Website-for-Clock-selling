<?php

require_once './database.php';
if (isset($_POST["submit"])) {
     if (empty($_POST["Firstname"]) or empty($_POST["password"])or empty($_POST["choice"])or empty($_POST["email"])) {
         header("Location:loginform.php?signup=empty");
    } 
    elseif (isset($_POST["Firstname"]) && isset($_POST["password"])) {
        $username = $_POST["Firstname"];
        $psw = $_POST["password"];
        $c = loginchecking($username, $psw);
        foreach ($c as $valid) {
            $valid["Password"];
            $valid["Username"];
        }
        if ($valid["Password"] == $psw && $valid["Username"] == $username) {
           header("Location:admin.php?signup=error");
        } else {
            registerinsert($username, $psw);
             header("Location:loginform.php?signup=success");
        }
    } 
} else {
    
}
?>

