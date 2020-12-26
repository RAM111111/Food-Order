<?php

include('../conf/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name'])){
$id = $_GET['id'];
$image_name = $_GET['image_name'];

if($image_name != ""){
  $path = "../images/food/".$image_name;
  $rm = unlink($path);

  if($rm == false){
    $_SESSION['uploade'] = "<div class='error'>delete feild</div>";
    header('location'.URL.'food/manage-food.php');
    die();
  }
}else {
$image_name = "";
}
$sql = "DELETE FROM tbl_food WHERE id='$id'";

$res = mysqli_query($con,$sql);
if($res==true){
  $_SESSION['delete'] = "<div class = 'success'> delete successfuly</div>";
  header('location:'.URL.'food/manage-food.php');
}else{
  $_SESSION['delete'] = "<div class = 'error'> delete feild</div>";;
  header('location:'.URL.'food/manage-food.php');
}
}
else {
header('location:'.URL.'food/manage-category.php');
}
/
 ?>
