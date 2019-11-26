<div class="container left PageSize ">
    <table class="table table-hover table-bordered allTable ">
        <thead  >
            <tr style="background-color:#036580">
                <th scope="col">#</th>
                <th scope="col">أسم الدائن</th>
                <th scope="col">تاريخ الدين</th>
                <th scope="col" colspan="2">الدين</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                $show = "SELECT * FROM `debt` ORDER BY `date` ASC";
                $result = mysqli_query($con,$show);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<th scope='row'>".$i."</th>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "<td>".$row['total']."</td>";
                    echo "<td><a class='btn btn-danger' href='SubmitDelete.php?id=".$row['id']."' > مسح الدين </a></td>";
                    echo "</tr>";
                    $i++;
                }
            ?>
        </tbody>
    </table>
</div>