<div class="container left PageSize ">

    <div class=" search left">
        <form class="row" action="<?php echo $_SERVER['PHP_SELF']."?page=Report"; ?>" method="post" >
            <label class="col-sm-5"> الرجاء أدخال الشهر المعين لعرض التقرير الخاص به </label>
            <select class="custom-select col-sm-2" name="year">
                <?php
                    for($i=2019;$i<=date('Y');$i++){
                        echo "<option value='".$i."' >".$i."</option>";
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
                <th scope="col">الشهر</th>
                <th scope="col">المجموع</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                $sum = 0;
                $date =$_POST['year'];
                $show = "SELECT SUM(`total`) FROM `reports` WHERE `type` != 'دين' AND `date` like '%".$date."%'";
                $result = mysqli_query($con, $show);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<th scope='row'>".$i."</th>";
                    echo "<td>".$date."</td>";
                    echo "<td>".$row["SUM(`total`)"]."</td>";
                    echo "</tr>";
                    $i++;
                }
            ?>
        </tbody>
    </table>



    <table class="table table-hover table-bordered allTable ">
        <thead  >
            <tr style="background-color:#ca245b">
            <th scope="col">#</th>
                <th scope="col">الشهر</th>
                <th scope="col">المجموع</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                $sum = 0;
                $date =$_POST['year'];
                $show = "SELECT SUM(`total`) FROM `reports` WHERE `type` = 'دين' AND `date` like '%".$date."%'";
                $result = mysqli_query($con, $show);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<th scope='row'>".$i."</th>";
                    echo "<td>".$date."</td>";
                    echo "<td>".$row["SUM(`total`)"]."</td>";
                    echo "</tr>";
                    $i++;
                }
            ?>
        </tbody>
    </table>
<?php
    }else{
        echo "<h1 style='text-align:center;margin:300px'>الرجاء قم بأختيار شهر معين</h1>";
    }
?>

</div>