<?php


define("HOST", "localhost");
define("USER", "id10461747_cart");
define("PASS", "cartcart");
define("DB", "id10461747_cart");

$con= mysqli_connect(HOST,USER,PASS,DB);
mysqli_query($con, "SET NAMES 'utf8'");
if(!$con)
{ die();}


   ?>