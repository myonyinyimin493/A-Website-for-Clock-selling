<?php

require_once './database.php';
if (isset($_POST["submit"])) {
    if (empty($_POST["Firstname"]) or empty($_POST["password"]) or empty($_POST["choice"])or empty($_POST["email"])) {
         header("Location:admin.php?signup=empty");
    } 
    elseif (isset($_POST["Firstname"]) && isset($_POST["password"])) {
        $username = $_POST["Firstname"];
        $psw = $_POST["password"];
         $d = adminchecking($username, $psw);
        foreach ($d as $valids) {
            $valids["Password"];
            $valids["Name"];
        }
        if ($valids["Password"] == $psw && $valids["Name"] == $username) {
            header("Location:admin.php?signup=error5");
        } else {
            registeradmin($username, $psw);
            header("Location:admin.php?signup=success");
        }
    } 
} else {
    
}
?>
