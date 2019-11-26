<div class="container" style="text-align: center; direction: rtl">
    <?php
    $flag = false;
    $arr = Array('temp','temp1');
    $show = "SELECT * FROM `cart_type` ORDER BY `company_name` ASC";
    $result = mysqli_query($con,$show);
    while($row = mysqli_fetch_assoc($result)){
        //////////////////////////
        if(!in_array($row['company_name'],$arr)){
            if ($flag) {
                echo "</div>";
            }
            echo "<div class='section ".$row['company_name']."'>";
            switch($row['company_name']){
                case "Asia": echo "أسيا سيل";break;
                case "Zain": echo "زين العراق";break;
                case "Korek": echo "كورك تليكوم";break;
                case "watania": echo "وطنية";break;
                case "amnia": echo "أمنية";break;
            }
            echo "</div>";
            echo "<div class='row left' style='padding-left: 50px;padding-right: 50px'>";
            $arr[] =$row['company_name'];
            $flag=true;
        }else{

        }

        ///////////////////
        
            echo "<div class='col-3'>";
                echo "<div class='head ".$row['company_name']."'>";
                    echo $row['type'];
                echo "</div>";
                echo "<table class='table body'>";
                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td>السعر</td>";
                            echo "<td>".$row['price']."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>العدد</td>";
                            echo "<td>".$row['number']."</td>";
                        echo "</tr>";
                    echo "</tbody>";
                echo "</table>";
            echo "</div>";
        









    }
    echo "</div>";
    ?>

</div>