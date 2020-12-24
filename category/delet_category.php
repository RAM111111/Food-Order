<?php
include('../conf/constants.php');
// echo "delet";

if(isset($_GET['id']) AND isset($_GET['image_name'])){

  $id = $_GET['id'];
  $image_name = $_GET['image_name'];



  if(isset($_SESSION['delete'])){
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);

}
  if($image_name !== ""){
    $path = "../images/category/".$image_name;
    $remove = unlink($path);
    if($remove==false){
      $_SESSION['remove'] = "<div class = 'error'> remove feild</div>";;
      header('location:'.URL.'category/manage-category.php');
      die();
    }
  }else {
  $image_name = "";
  }

  $sql = "DELETE FROM tbl_category WHERE id='$id'";

  $res = mysqli_query($con,$sql);
  if($res==true){
    $_SESSION['delete'] = "<div class = 'success'> delete successfuly</div>";
    header('location:'.URL.'category/manage-category.php');
  }else{
    $_SESSION['delete'] = "<div class = 'error'> delete feild</div>";;
    header('location:'.URL.'category/manage-category.php');
  }
}
else {
 header('location:'.URL.'category/manage-category.php');
}


 ?>
