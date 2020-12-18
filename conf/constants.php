<?php
session_start();
define('URL','http://192.168.64.4/Food-Order/');
define('LOCALHOST','localhost');
define('DB_UN','root');
define('DB_PAS','');
define('DB_N','Food_Order');

$con = mysqli_connect(LOCALHOST,DB_UN,DB_PAS) or die(mysqli_error());
// if(!$con){
//   echo "not";
// }else{
//   echo "conn";
// }

$db_select = mysqli_select_db($con,DB_N)or die(mysqli_error());
  // $res = mysqli_query($con,$sql) or die (mysqli_error());

 ?>
