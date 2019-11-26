<?php
include '../include/connect.php';
session_start();
date_default_timezone_set('asia/baghdad');

if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['submit'] == "الرجوع"){
    header('location:Sell.php?page=Sell');
}

if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST['submit'] == "أضافة لقائمة الديون") {
    $sql = "INSERT INTO `debt`( `name`, `date`, `total`) 
            VALUES ('".$_POST['name']."','".date('Y-n-j')."',".$_SESSION['collect'].")";
    if (mysqli_query($con, $sql)) {
        foreach ($_SESSION['tikit'] as $key => $value) {
            if ($value == 0) {
                continue;
            } elseif ($value > 0) {
                $show = "SELECT `number` FROM `cart_type` WHERE `id` =".$key;
                $result = mysqli_query($con,$show);
                $row = mysqli_fetch_assoc($result);
                $sub = $row['number'] - $value;
                $sql = "UPDATE `cart_type` SET `number`=".$sub." WHERE `id`=".$key;
                mysqli_query($con, $sql);
                header('location:Sell.php?page=Sell');
            }
        }
    }
}

if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['submit'] == "طباعة الوصل"){
    foreach($_SESSION['tikit'] as $key => $value ){
        if ($value == 0) {
            continue;
        } elseif ($value > 0) {
            $show = "SELECT * FROM `cart_type` WHERE `id` =".$key;
            $result = mysqli_query($con,$show);
            $row = mysqli_fetch_assoc($result);
            $total = str_replace(',','',$row['price']) * $value;
            $sql = "INSERT INTO `reports`( `company_name`, `type`, `price`, `number`, `total`, `date`) 
                        VALUES ('".$row['company_name']."','".$row['type']."','".$row['price']."','".$value."','".$total."','".date('Y-n-j')."')";
            mysqli_query($con, $sql);
        }
    }

    foreach($_SESSION['tikit'] as $key => $value ){
        if ($value == 0) {
            continue;
        } elseif ($value > 0) {
            $show = "SELECT `number` FROM `cart_type` WHERE `id` =".$key;
            $result = mysqli_query($con,$show);
            $row = mysqli_fetch_assoc($result);
            $sub = $row['number'] - $value;
            $sql = "UPDATE `cart_type` SET `number`=".$sub." WHERE `id`=".$key;
            $a = "UPDATE `cart_type` SET `number`= WHERE `id`=";
            mysqli_query($con, $sql);
            header('location:Sell.php?page=Sell');
        }
    }

}
?>