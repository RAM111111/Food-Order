<?php include('../admin/partials/menu.php') ?>


<div class="main-content">
  <div class="wrapper">
    <h1>Add category</h1>
     <br><br>

      <?php
      if(isset($_SESSION['uploud'])){
        echo $_SESSION['uploud'];
        unset($_SESSION['uploud']);
      }

      if(isset($_SESSION['add_cat'])){
        echo $_SESSION['add_cat'];
        unset($_SESSION['add_cat']);
      }


       ?>


    <form class="" action="" method="post" enctype="multipart/form-data">
      <table class="tbl-30">
        <tr>
          <td>title</td>
          <td> <input type="text" name="title" placeholder="Enter title"></td>
        </tr>


          <tr>
            <td>image</td>
            <td> <input type="file" name="img" ></td>
          </tr>

          <td>Featured</td>
          <td>
      <input type="radio" name="featured" value="Yes"> Yes
      <input type="radio" name="featured" value="No"> No
          </td>
        </tr>

        <tr>
          <td>Active</td>
          <td>
      <input type="radio" name="active" value="Yes"> Yes
      <input type="radio" name="active" value="No"> No
          </td>
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

// $img_n = "";
//
// print_r($_FILES['img']);
// die();

if(($_FILES['img']['name']) !=''){
$img_n = $_FILES['img']['name'];
$ex = end(explode('.',$img_n));
$img_n = "food_category".rand(000,999).'.'.$ex;

  $sp = $_FILES['img']['tmp_name'];
  $des = "../images/category/".$img_n;
  $up = move_uploaded_file($sp,$des);
  if($up==false){
    $_SESSION['uploud'] = "<div class = 'error'> uploud feild</div>";;
    header('location:'.URL.'category/add_category.php');
    die();
  }

}else {
$img_n = "";
}
$sql = "INSERT INTO tbl_category SET
title = '$title',
image_name='$img_n',
featured = '$featured',
active = '$active'
";
echo $sql;

$res = mysqli_query($con,$sql)or ('no');

if($res==true){
  $_SESSION['add_cat'] = "<div class = 'success'> add category successfuly</div>";
  header("location:".URL.'category/manage-category.php');
}else{
  $_SESSION['add_cat'] ="<div class = 'error'> faild to add category</div>";
  header("location:".URL.'category/add_category.php');
}

}
 ?>
