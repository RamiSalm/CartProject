<?php
    include '../include/connect.php';
        session_start();
    include '../include/header.html';



    $_SESSION['tikit'] = $_POST;

    $collect = 0;
?>

<div class="container left PageSize ">
    <div class="jumbotron left " style="text-align: right;height: 290px;">
        <h1 class="display-5">هذه الصفحة لمراجعة الطلب وتأكيده او ادخال القيم من جديد </h1><br>
        <form action="doDB.php" method="post">
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label" >الرجاء ادخال المشتري </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="الاسم الثلاثي الكامل " name="name"><br>
                    <div class='printbt'>
                        <input class="btn btn-success btn-lg" type="submit" value="طباعة الوصل" name="submit">
                        <input class="btn btn-primary btn-lg" type="submit" value="الرجوع" name="submit">
                        <input class="btn btn-warning btn-lg" type="submit" value="أضافة لقائمة الديون" name="submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <table class="table table-hover table-bordered allTable ">
        <thead  >
            <tr class="bg-success">
                <th scope="col">#</th>
                <th scope="col">الشركة </th>
                <th scope="col">الفئة</th>
                <th scope="col">العدد</th>
                <th scope="col">سعر المفرد</th>
                <th scope="col">السعر الكلي</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i =1;
                foreach($_POST as $key => $value){
                    if($value == 0){
                        continue;
                    }elseif($value > 0){
                        $show = "SELECT * FROM `cart_type` WHERE `id` =".$key;
                        $result = mysqli_query($con,$show);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<th scope='row'>".$i."</th>";
                            echo "<td>".$row['company_name']."</td>";
                            echo "<td>".$row['type']."</td>";
                            echo "<td>".$value."</td>";
                            echo "<td>".$row['price']."</td>";
                            $price = str_replace(",","",$row['price']);
                            $collect = $collect + ($price * $value);
                            echo "<td>".$price * $value."</td>";
                            echo "</tr>";
                            $i++;
                        }
                        }
                    }
                $_SESSION['collect'] = $collect;
            ?>
        </tbody>
    </table>
</div>

<div class='fixed-bottom'>
<?php
include '../include/footer.html';
?>