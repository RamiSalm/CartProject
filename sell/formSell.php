<form action="SubmitDB.php" method="post">
    <div class="row left" style='margin-right: 10px;'>
        <?php
            $flag = false;
            $arr = Array('temp','temp1');
            $show = "SELECT * FROM `cart_type` ORDER BY `company_name` ASC";
            $result = mysqli_query($con,$show);
            while ($row = mysqli_fetch_assoc($result)) {
                //////////////////////////
                if (!in_array($row['company_name'], $arr)) {
                    if ($flag) {
                        echo " </div> ";
                        echo " </div> ";
                        $flag = false ;
                    }
                    echo " <div class='col-3' style='margin-left: -10px ;margin-bottom: 20px ;'> ";
                    echo " <div class=' bodySell ' > ";
                    echo " <div class='row'> ";
                    echo " <div class=' col-sm-11 head ".$row['company_name']." headSell' > ";
                    switch ( $row['company_name'] ) {
                        case "Asia": echo "أسيا سيل";break;
                        case "Zain": echo "زين العراق";break;
                        case "Korek": echo "كورك تليكوم";break;
                        case "watania": echo "وطنية";break;
                        case "amnia": echo "أمنية";break;
                    }
                    echo " </div> ";
                    $arr[] = $row['company_name'] ;
                    $flag = true;
                } else {
                    echo " <div class='row'> ";
                } 
        ?>
    
                    <div class="boxElement "> <?php echo $row['type']; ?> </div>
                    <div class="col-sm-4 inputsellholder">
                        <input type="number" name=" <?php echo $row['id']; ?>" class="form-control inputsell" value="0" max="<?php echo $row['number']; ?>" min="0">
                    </div>
                    <div class="col-sm-1">/<?php echo $row['number']; ?> </div>
                </div>
        <?php
            }
        ?>
    </div>
    </div>
    </div>
    <div class=" buttomStyle ">
            <input class=" btn btn-success btn-lg " type="submit" value="رؤية الوصل ">
    </div>
    </div>
</form>
