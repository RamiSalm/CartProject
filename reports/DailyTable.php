<div class="container left PageSize ">

    <div class=" search left">
        <form class="row" action="<?php echo $_SERVER['PHP_SELF']."?page=Report"; ?>" method="post" >
            <label class="col-sm-5"> الرجاء أدخال اليوم المعين لعرض التقرير الخاص به </label>
            <select class="custom-select col-sm-2" name="day">
                <?php
                    for($i=1;$i<=31;$i++){
                        echo "<option value='-".$i."' >".$i."</option>";
                    }
                ?>
            </select>
            <input class="btn btn-success" type="submit" value="عرض التقرير" >
        </form>
    </div>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        ?>
    <table class="table table-hover table-bordered allTable ">
        <thead  >
            <tr style="background-color:#036580">
                <th scope="col">#</th>
                <th scope="col">الشركة</th>
                <th scope="col">النوع</th>
                <th scope="col">سعر المفرد</th>
                <th scope="col">العدد</th>
                <th scope="col">المجموع</th>
                <th scope="col">تاريخ البيع</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                $sum = 0;
                $date = date('Y-n');
                $date .=$_POST['day'];
                $show = "SELECT * FROM `reports` WHERE `type` != 'دين' AND `date`='".$date."' ORDER BY `company_name` ASC";
                $result = mysqli_query($con, $show);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<th scope='row'>".$i."</th>";
                    echo "<td>".$row['company_name']."</td>";
                    echo "<td>".$row['type']."</td>";
                    echo "<td>".$row['price']."</td>";
                    echo "<td>".$row['number']."</td>";
                    echo "<td>".$row['total']."</td>";
                    $sum += $row['total'];
                    echo "<td>".$row['date']."</td>";
                    echo "</tr>";
                    $i++;
                }
                echo "<tr>";
                echo "<td style='color:#036580' colspan='4'>المجموع الكلي للبيع</td>";
                echo "<td style='color:#28a745' colspan='3'>".$sum."</td>";
                echo "</tr>"; 
            ?>
        </tbody>
    </table>



    <table class="table table-hover table-bordered allTable ">
        <thead  >
            <tr style="background-color:#ca245b">
                <th scope="col">#</th>
                <th scope="col">اسم الدائن</th>
                <th scope="col">تاريخ اخذ القرض</th>
                <th scope="col">المجموع</th>
                <th scope="col">تاريخ تسديد القرض</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                $sum = 0;
                $date = date('Y-n');
                $date .=$_POST['day'];
                $show = "SELECT * FROM `reports` WHERE `type` = 'دين' AND `date`='".$date."' ORDER BY `company_name` ASC";
                $result = mysqli_query($con, $show);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<th scope='row'>".$i."</th>";
                    echo "<td>".$row['company_name']."</td>";
                    echo "<td>".$row['price']."</td>";
                    echo "<td>".$row['total']."</td>";
                    $sum += $row['total'];
                    echo "<td>".$row['date']."</td>";
                    echo "</tr>";
                    $i++;
                }
                echo "<tr>";
                echo "<td style='color:#036580' colspan='3'>المجموع الكلي للبيع</td>";
                echo "<td style='color:#28a745' colspan='3'>".$sum."</td>";
                echo "</tr>"; 
            ?>
        </tbody>
    </table>
<?php
    }else{
        echo "<h1 style='text-align:center;margin:300px'>الرجاء قم بأختيار يوم معين</h1>";
    }
?>

</div>