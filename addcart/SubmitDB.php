<?php
    include '../include/connect.php';
    session_start();

    

    $company = $_POST['company'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $number = $_POST['number'];
    if(!empty($company) && !empty($type) && !empty($price)){
        $insert = "INSERT INTO `cart_type`(`company_name`, `type`, `price`, `number`) 
                    VALUES ('".$company."','".$type."','".$price."',".$number.")";
        mysqli_query($con,$insert);
        header('location:Addcart.php?page=Addcart');
    }
    $_POST['number']=0;
    foreach ($_POST as $key => $value) {
        if ($value == 0) {
            continue;
        } elseif ($value > 0) {
            $show = "SELECT `number` FROM `cart_type` WHERE `id` =".$key;
            $result = mysqli_query($con,$show);
            $row = mysqli_fetch_assoc($result);
            $sub = $row['number'] + $value;
            $sql = "UPDATE `cart_type` SET `number`=".$sub." WHERE `id`=".$key;
            mysqli_query($con, $sql);
            header('location:Addcart.php?page=Addcart');
        }
    }

?>