<?php include('../admin/partials/menu.php') ?>


<div class="main-content">
  <div class="wrapper">
    <h1>Add category</h1>
     <br><br>

      <?php
      if(isset($_SESSION['add_cat'])){
        echo $_SESSION['add_cat'];
        unset($_SESSION['add_cat']);
      }
       ?>


    <form class="" action="" method="post">
      <table class="tbl-30">
        <tr>
          <td>title</td>
          <td> <input type="text" name="title" placeholder="Enter title"></td>
        </tr>
        <tr>

          <td>featured</td>
          <td> <input type="radio" name="featured" value="Yes"> Yes </td>
          <td> <input type="radio" name="featured" value="No"> No </td>
        </tr>

        <tr>
          <td>active</td>
          <td> <input type="radio" name="active" value="Yes"> Yes </td>
          <td> <input type="radio" name="active" value="No"> No </td>
        </tr>

        <tr>
          <td colspan="2"> <input type="submit" name="Submit11" value="add-category" class="btn-primary">
          </td>
        </tr>
      </table>
    </form>
  </div>


</div>
<?php include('../admin/partials/footer.php') ?>


<?php
if(isset($_POST['Submit11'])){
$title=$_POST['title'];

if(isset($_POST['featured'])){
  $featured=$_POST['featured'];
}else{
  $featured="No";
}

if(isset($_POST['active'])){
  $active=$_POST['active'];
}else{
  $active="No";
}




// $sql = "INSERT INTO tbl_admin SET
// title = '$title',
// featured = '$featured',
// active = '$active'
// ";
$sql = "INSERT INTO tbl_category SET
title = '$title',
image_name='ii',
featured = '$featured',
active = '$active'
";
echo $sql;

$res = mysqli_query($con,$sql)or ('no');

if($res==true){
  $_SESSION['add_cat'] = 'add category successfuly';
  header("location:".URL.'admin/manage-category.php');
}else{
  $_SESSION['add_cat'] = 'faild to add category';
  header("location:".URL.'admin/add_category.php');
}

}
 ?>
