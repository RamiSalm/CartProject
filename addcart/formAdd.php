<form action="SubmitDB.php" method="post">
    <div class="row left" style='margin-right: 10px;'>
        <?php
            $company = array("Asia","Zain","Korek","amnia","watania");
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
                        <input type="number" name=" <?php echo $row['id']; ?>" class="form-control inputsell" value="0" min="0">
                    </div>
                    <div class="col-sm-1">/<?php echo $row['number']; ?> </div>
                </div>
        <?php
            }
        ?>
    </div>
    </div>
    </div>
    <div class=" left bodyAdd ">
        <div class="row">
            <h3 class="col-sm-7">يرجى أدخال فئة جديدة غير موجودة اعلاه</h3>
            <p class="col-sm-7">يرجى مراعة نسق الفئة كما مبين في حقول الادخال</p>
        </div>
        <div class="row">
            <select name= 'company' class="custom-select col-sm-2 ">
                <?php
                    foreach( $company as $com){
                        echo " <option  value='".$com."' >";
                        switch ( $com ) {
                            case "Asia": echo "أسيا سيل";break;
                            case "Zain": echo "زين العراق";break;
                            case "Korek": echo "كورك تليكوم";break;
                            case "watania": echo "وطنية";break;
                            case "amnia": echo "أمنية";break;
                        }
                        echo "</option> ";
                    }
                ?>
            </select>
            <label> نوع الكارت</label><input type="text" name="type" class="form-control col-sm-2" placeholder="كارت فئة 0,000">
            <label>سعر المفرد</label><input type="text" name="price" class="form-control col-sm-2" placeholder="السعر 0,000">
            <label>العدد الكلي</label><input type="text" name="number" class="form-control col-sm-2" placeholder="عدد الكارتات">
        </div>
    </div>
    <div class=" buttomStyle ">
        <input class=" btn btn-success btn-lg " type="submit" value="تأكيد الأضافة" >
    </div>
    </div>
</form>
