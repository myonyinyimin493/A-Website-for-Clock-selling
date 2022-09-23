<?php

function StartConnection() {
    $con = new PDO("mysql:dbname=monkey", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $con;
}

function EndConnection() {
    $con = null;
}

function loginchecking($user, $pw) {
    try {
        $con = StartConnection();
        $sql = "select * from myuser where Username='" . $user . "'AND Password='" . $pw . "'";
        $data = $con->query($sql);
    } catch (PDOException $e) {
        echo "<script type='text/javascript'>alert('Quotation cannot use in input');</script>";
        echo '<script> window.location="loginform.php"</script>';
    }
    EndConnection();
    return $data;
}

function adminchecking($user, $pw) {
    try {
        $con = StartConnection();
        $sql = "select * from myadmin where Name='" . $user . "'AND Password='" . $pw . "'";
        $data = $con->query($sql);
    } catch (PDOException $e) {
        echo "<script type='text/javascript'>alert('Quotation cannot use in input');</script>";
        echo '<script> window.location="admin.php"</script>';
    }
    EndConnection();
    return $data;
}

function registerinsert($user, $pw) {
    try {
        $con = StartConnection();
        $sql = "INSERT INTO myuser (Username,Password) values ('$user','$pw')";
        $con->exec($sql);
    } catch (PDOException $e) {
        echo "<script type='text/javascript'>alert('Quotation cannot use in input');</script>";
        echo '<script> window.location="loginform.php"</script>';
    }
    EndConnection();
}

function registeradmin($user, $pw) {
    try {
        $con = StartConnection();
        $sql = "INSERT INTO myadmin (Name,Password) values ('$user','$pw')";
        $con->exec($sql);
    } catch (PDOException $e) {
        echo "<script type='text/javascript'>alert('Quotation cannot use in input');</script>";
        echo '<script> window.location="admin.php"</script>';
    }
    EndConnection();
}

function iteminsert($choic, $name, $price, $qty, $img) {
    try {
        $con = StartConnection();
        $sql = "INSERT INTO iteminsert (Choice,Name,Qty,Price,image) values ('$choic','$name',$price,$qty,'$img')";
        $con->exec($sql);
    } catch (PDOException $e) {
        echo "<script type='text/javascript'>alert('Quotation cannot use in input');</script>";
        echo '<script> window.location="admin.php"</script>';
    }
    EndConnection();
}

function defaultshowing($start) {
    $con = StartConnection();
    $sql = "Select * from iteminsert LIMIT $start,5";
    $data = $con->query($sql);
    EndConnection();
    return $data;
}

function viewcount() {
    $con = StartConnection();
    $sql = "SELECT count(ID) as count FROM iteminsert";
    $count = 0;
    $row = $con->query($sql);
    if ($row->rowCount() > 0) {
        $data = $row->fetch();
        $count = $data["count"];
    }
    EndConnection();
    return $count;
}

function searching($keyword, $start) {
    try {
        $con = StartConnection();
        $sql = "SELECT * FROM iteminsert WHERE Name LIKE '%$keyword%' LIMIT $start,4";
        $data = $con->query($sql);
    } catch (PDOException $e) {
        echo "<script type='text/javascript'>alert('Quotation cannot use in input');</script>";
        echo '<script> window.location="admin.php"</script>';
    }
    EndConnection();
    return $data;
}

function searchcount($keyword) {
    $con = StartConnection();
    $sql = "SELECT count(ID) as count FROM iteminsert WHERE Name LIKE '%$keyword%'";
    $count = 0;
    $row = $con->query($sql);
    if ($row->rowCount() > 0) {
        $data = $row->fetch();
        $count = $data["count"];
    }
    EndConnection();
    return $count;
}

//function defaultsearching($upgrade) {
//    $con = StartConnection();
//    $sql = "Select * from iteminsert where ID LIKE '%$upgrade'";
//    $data = $con->query($sql);
//    EndConnection();
//    return $data;
//}

function updatingdata($upid, $upchoice, $upname, $upqty, $price, $upimage) {
    $con = StartConnection();
    $sql = "UPDATE iteminsert set Choice=:u,Name=:n,Qty=:q,Price=:p,image=:i WHERE ID=:d";

    $prepareStatement = $con->prepare($sql);
    $prepareStatement->bindParam(":u", $upchoice, PDO::PARAM_STR);
    $prepareStatement->bindParam(":n", $upname, PDO::PARAM_STR);
    $prepareStatement->bindParam(":q", $upqty, PDO::PARAM_INT);
    $prepareStatement->bindParam(":p", $price, PDO::PARAM_INT);
    $prepareStatement->bindParam(":i", $upimage, PDO::PARAM_STR);
    $prepareStatement->bindParam(":d", $upid, PDO::PARAM_INT);

    $prepareStatement->execute();
    EndConnection();
}

function deletingdata($deid) {
    $con = StartConnection();
    $sql = "DELETE FROM iteminsert WHERE ID=$deid";
    $data = $con->exec($sql);
    EndConnection();
}

function usershow() {
    $con = StartConnection();
    $sql = "Select * from iteminsert LIMIT 0,8";
    $data = $con->query($sql);
    EndConnection();
    return $data;
}

function man($start) {
    $con = StartConnection();
    $sql = "SELECT * FROM iteminsert WHERE Choice LIKE 'Male' LIMIT $start,8";
    $data = $con->query($sql);
    EndConnection();
    return $data;
}

function mancount() {
    $con = StartConnection();
    $sql = "SELECT count(ID) as count FROM iteminsert WHERE Choice LIKE 'Male'";
    $count = 0;
    $row = $con->query($sql);
    if ($row->rowCount() > 0) {
        $data = $row->fetch();
        $count = $data["count"];
    }
    EndConnection();
    return $count;
}

function women($start) {
    $con = StartConnection();
    $sql = "SELECT * FROM iteminsert WHERE Choice LIKE 'Female' LIMIT $start,8";
    $data = $con->query($sql);
    EndConnection();
    return $data;
}

function womencount() {
    $con = StartConnection();
    $sql = "SELECT count(ID) as count FROM iteminsert WHERE Choice LIKE 'Female'";
    $count = 0;
    $row = $con->query($sql);
    if ($row->rowCount() > 0) {
        $data = $row->fetch();
        $count = $data["count"];
    }
    EndConnection();
    return $count;
}

function searchforusershow($keyword, $start) {
    try {
        $con = StartConnection();
        $sql = "SELECT * FROM iteminsert WHERE Name LIKE '%$keyword%' LIMIT $start,8";
        $data = $con->query($sql);
    } catch (PDOException $e) {
        echo "<script type='text/javascript'>alert('Quotation cannot use in input');</script>";
        echo '<script> window.location="afterlogin.php"</script>';
    }
    EndConnection();
    return $data;
}

function searchforusershowcount($keyword) {
    $con = StartConnection();
    $sql = "SELECT count(ID) as count FROM iteminsert WHERE Name LIKE '%$keyword%'";
    $count = 0;
    $row = $con->query($sql);
    if ($row->rowCount() > 0) {
        $data = $row->fetch();
        $count = $data["count"];
    }
    EndConnection();
    return $count;
}

function itemoutpingforcheckout($a) {
    $con = StartConnection();
    $sql = "Select * from iteminsert where ID=$a";
    $data = $con->query($sql);
    EndConnection();
    return $data;
}

//function orderinsert($bname,$baddress,$bph,$bemail,$iname,$iprice,$iqty) {
//    $con = StartConnection();
//    $sql = "INSERT INTO order (Name=:n,Address=:a,Phone=:p,Email=:e,ItemName=:i,Price=:p,Quantity=:q) values ('$bname','$baddress',$bph,'$bemail','$iname',$iprice,$iqty)";
//    $prepareStatement = $con->prepare($sql);
//    $prepareStatement->bindParam(":n", $bname,PDO::PARAM_STR);
//    $prepareStatement->bindParam(":a", $baddress,PDO::PARAM_STR);
//    $prepareStatement->bindParam(":p", $bph,PDO::PARAM_INT);
//    $prepareStatement->bindParam(":e", $bemail,PDO::PARAM_STR);
//    $prepareStatement->bindParam(":i", $iname,PDO::PARAM_STR);
//    $prepareStatement->bindParam(":p", $iprice,PDO::PARAM_INT);
//    $prepareStatement->bindParam(":q", $iqty,PDO::PARAM_INT);
//    $con->exec($sql);
//    EndConnection();
//}

function orderinsert($bname, $baddress, $bemail, $bphone, $itname, $itemprice, $itemqty) {
    try {
        $con = StartConnection();
        $sql = "INSERT INTO myorder (Username,Address,Useremail,Userphone,Iname,Iprice,Iqty) values ('$bname','$baddress','$bemail','$bphone','$itname',$itemprice,$itemqty)";
        $con->exec($sql);
    } catch (PDOException $e) {
        echo "<script type='text/javascript'>alert('Quotation cannot use in input');</script>";
        echo '<script> window.location="cart.php"</script>';
    }
    EndConnection();
}

function updatingqty($id, $qty) {
    $con = StartConnection();
    $sql = "UPDATE iteminsert set Qty=$qty WHERE ID=$id";
    $data = $con->exec($sql);
    EndConnection();
}

function defaultordershowing() {
    $con = StartConnection();
    $sql = "Select * from myorder";
    $data = $con->query($sql);
    EndConnection();
    return $data;
}

function searchproductdetail($keyword) {
    $con = StartConnection();
    $sql = "SELECT * FROM iteminsert WHERE ID LIKE '%$keyword%'";
    $data = $con->query($sql);
    EndConnection();
    return $data;
}

function defaultcustomershowing() {
    $con = StartConnection();
    $sql = "Select * from myuser";
    $data = $con->query($sql);
    EndConnection();
    return $data;
}
