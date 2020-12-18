<?php
include('../conf/constants.php');

 $id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res = mysqli_query($con,$sql) ;
if($res==true){
  $_SESSION['add'] = "<div class = 'success'>admin deleted successfuly</div>";
  header("location:".URL.'admin/manage-admin.php');
}else{
  $_SESSION['add'] = "<div class = 'success'>deleted admin feild</div>";
  header("location:".URL.'admin/manage-admin.php');
}

 ?>
