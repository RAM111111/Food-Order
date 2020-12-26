<?php


include('../conf/constants.php');
if(isset($_GET['id']) AND isset($_GET['image_name'])){
$id = $_GET['id'];
$image_name = $_GET['image_name'];

if(image_name != ""){
  $path = "../images/food".$image_name;
  $rm = unlink($path);

  if($rm == false){
    $_SESSION['uploade'] =  "<div class='error'>uploade feild</div>";
    header('location'.URL.'food/delete_food.php');
    die();
  }
}
$sql = "DELETE * FROM tbl_food WHERE id='$id'";
$res = mysqli_query($res);

if($res==true){
  $_SESSION['delete'] = "<div class='success'>delet successfuly</div>";
  header('location'.URL.'food/manage_food.php');
}else {
  $_SESSION['delete'] = "<div class='error'>delet error</div>";
  header('location'.URL.'food/delete_food.php');
}

}else {
  $_SESSION['delete-1'] = "<div class='success'>added successfuly</div>";
  header('location'.URL.'food/delete_food.php');
}
 ?>
