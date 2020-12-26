<?php include '../admin/partials/menu.php';?>

<?php
if(($_GET['id'])!= ''){
  $id = $_GET['id'];
  $sql = "SELECT * FROM tbl_category WHERE id ='$id'";
  $res = mysqli_query($con,$sql);
  $count = mysqli_num_rows($res);

  if($count==1){
    $row = mysqli_fetch_assoc($res);
    $title = $row['title'];
    $image_current = $row['image_name'];

    $featured = $row['featured'];
    $active = $row['active'];
  }

  else {
    $_SESSION['no_category'] = "<div class = 'error'> no category found</div>";
    header('location:'.URL.'category/manage-category.php');
  }

}else {
  header('location:'.URL.'category/manage-category.php');

}?>

<div class="main-content">
  <div class="wrapper">
    <h1>Update Category</h1>

    <br><br>
<form class="" action="" method="post" enctype="multipart/form-data">
  <table class="tbl-30">
  <tr>
    <td>Title</td>
    <td>
    <input type="text" name="title" value="<?php echo $title; ?>">
    </td>
  </tr>

  <tr>
    <td>Current image</td>
    <td>
      <?php
if($image_current != ""){
?>
<img src="../images/category/<?php echo $image_current ; ?>" alt="" width="100px" height="75px">
<?php

}else {
  echo "<div class = 'error'> no category found</div>";
}
       ?>
    </td>
  </tr>

  <tr>
    <td>New image</td>
    <td>
    <input type="file" name="img" value="">
    </td>
  </tr>

  <tr>
    <td>Featured</td>
    <td>
<input <?php if($featured=='Yes'){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
<input <?php if($featured=='No'){echo "checked";} ?> type="radio" name="featured" value="No"> No
    </td>
  </tr>

  <tr>
    <td>Active</td>
    <td>
<input <?php if($active=='Yes'){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
<input <?php if($active=='No'){echo "checked";} ?> type="radio" name="active" value="No"> No
    </td>
  </tr>

  <tr>
    <td>
      <input type="hidden" name="current_img" value="<?php echo $image_current ; ?>">
      <input type="hidden" name="id" value="<?php echo $id ; ?>">
    <input type="submit" name="submit" value="update category" class="btn-secondary">
    </td>
  </tr>

    </table>
   </form>
  </div>
</div>




<?php
if(isset($_POST['submit'])){
echo "string  ";

  $id = $_POST['id'];
  $title = $_POST['title'];
  $image_current = $_POST['current_img'];
  $featured = $_POST['featured'];
  $active = $_POST['active'];

  echo $image_current ;
  echo $id;
  echo $title;
  echo $image_name;
  echo $featured;

  echo $active;


if(($_FILES['img']['name']) != ""){

  $image_name = $_FILES['img']['name'];
  $ex = end(explode('.',$image_name));
  $image_name = "food_category".rand(000,999).'.'.$ex;

    $sp = $_FILES['img']['tmp_name'];
    $des = "../images/category/".$image_name;
    $up = move_uploaded_file($sp,$des);
    if($up==false){
      $_SESSION['uploud'] = "<div class = 'error'> uploud feild</div>";
      header('location:'.URL.'category/manage-category.php');
      die();
    }

    if($image_current != ""){
      $rp = "../images/category/".$image_current;
      $re = unlink($rp);

      if($re==false){
        $_SESSION['feild_r']="<div class = 'error'> remove feild</div>";
        header('location:'.URL.'category/manage-category.php');
        die();
      }
    }

  }else {
  $image_name = $image_current;
  }
  echo $image_name;

  $sql88 = "UPDATE tbl_category SET
   title = '$title',
   image_name = '$image_name',
   featured = '$featured',
   active = '$active'
   WHERE id = '$id'
  ";

    $res88 = mysqli_query($con,$sql88);

if($res88==true){
    $_SESSION['update']= "<div class = 'success'> updated successfuly</div>";
    header('location:'.URL.'category/manage-category.php');
}
else {
    $_SESSION['update']= "<div class = 'error'> updated feild</div>";
    header('location:'.URL.'category/update_category.php');
}

}
 ?>


<?php include '../admin/partials/footer.php'; ?>
