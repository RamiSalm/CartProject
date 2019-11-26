
<?php
    include '../include/connect.php';
    $date = date('Y-n-j');
    $sql = "SELECT * FROM `debt` WHERE `id`=".$_GET['id'];
    $result = mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $insert = "INSERT INTO `reports`(`company_name`, `type`, `price`, `number`, `total`, `date`) 
                    VALUES ('".$row['name']."','دين','".$row['date']."','0',".$row['total'].",'".$date."')";
        if(mysqli_query($con,$insert)){
            $delete = "DELETE FROM `debt` WHERE `id`=".$_GET['id'];
            if(mysqli_query($con,$delete)){
                header('location:Debt.php?page=Debt');
            }        
        }else{
            echo mysqli_error;
        }
    }


?>