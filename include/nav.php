
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navreduce fixed-top ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" 
    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse left " id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item navpush">
          <a href="../Home/Home.php?page=Home"><button type="button" href="#" class="btn <?php if($_GET['page'] == "Home"){echo "btn-success";}else{echo "btn-light";} ?> btn-lg buttonreduce ">الصفحة الرئيسية</button> </a>
        </li>
        <li class="nav-item navpush" >
            <a href="../sell/Sell.php?page=Sell"><button type="button" href="#" class="btn <?php if($_GET['page'] == "Sell"){echo "btn-success";}else{echo "btn-light";} ?> btn-lg buttonreduce" >صفحة البيع</button> </a>
        </li>
        <li class="nav-item  navpush" > 
            <a href="../addcart/Addcart.php?page=Addcart"><button type="button" href="#" class="btn <?php if($_GET['page'] == "Addcart"){echo "btn-success";}else{echo "btn-light";} ?> btn-lg buttonreduce">أضافة كارت</button> </a>
        </li>
        <li class="nav-item  navpush" >
            <a href="../debt/Debt.php?page=Debt"><button type="button" href="#" class="btn <?php if($_GET['page'] == "Debt"){echo "btn-success";}else{echo "btn-light";} ?> btn-lg buttonreduce">الديون</button> </a>
        </li>
        <li class="nav-item dropdown  navpush">
          
            <button type="button" href="#" class="btn <?php if($_GET['page'] == "Report"){echo "btn-success";}else{echo "btn-light";} ?> btn-lg buttonreduce dropdown-toggle"
             id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">تقرير المبيعات</button>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="../reports/Daily.php?page=Report">التقرير اليومي</a>
            <a class="dropdown-item" href="../reports/Monthly.php?page=Report">التقرير الشهري</a>
            <a class="dropdown-item" href="../reports/Annual.php?page=Report">التقرير السنوي</a>
          </div>
        </li>
        <li class="nav-item  navpush" >
          <a href="../about/About.php?page=About"><button type="button" href="#" class="btn <?php if($_GET['page'] == "About"){echo "btn-success";}else{echo "btn-light";} ?> btn-lg buttonreduce"> من نحن</button> </a>
        </li>
      </ul>
    </div>
  </nav>
<div style="
margin-bottom: 80px;">

</div>

