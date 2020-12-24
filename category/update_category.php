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
    $image_name = $row['image_name'];
    $featured = $row['featured'];
    $active = $row['active'];

  }
  else {
    $_SESSION['no_category'] = "<div class = 'error'> no category found</div>";
    header('location:'.URL.'category/manage-category.php');
  }
}else {
  header('location:'.URL.'category/manage-category.php');

}

 ?>
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
if($image_name!=""){
?>
<img src="../images/category/<?php echo $image_name ; ?>" alt="" width="100px" height="75px">
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

  </table>
</form>
  </div>
</div>
<?php include '../admin/partials/footer.php'; ?>
