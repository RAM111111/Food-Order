<?php include '../admin/partials/menu.php';?>

<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql2 = "SELECT * FROM tbl_food WHERE id='$id'";
  $res2 = mysqli_query($con,$sql2);
  $row2 = mysqli_fetch_assoc($res2);

  $title = $row2['title'];
  $description = $row2['description'];
  $price = $row2['price'];
  $image_current = $row2['image_name'];
  $category_current = $row2['category_id'];
  $featured = $row2['feature'];
  $active = $row2['active'];

}
else {

}
 ?>



<div class="main-content">
  <div class="wrapper">
    <h1>Update food</h1>
    <br><br>
    <?php
    if(isset($_SESSION['uploade'])){
      echo $_SESSION['uploade'];
      unset($_SESSION['uploade']);
    }

    if(isset($_SESSION['update'])){
      echo $_SESSION['update'];
      unset($_SESSION['update']);
    }
     ?>
    <br><br>
    <form class="" action="" method="post" enctype="multipart/form-data">
      <table class="tbl-30">

        <tr>
          <td>title</td>
          <td>
           <input type="text" name="title" value="<?php echo $title; ?>">
          </td>
        </tr>



        <tr>
          <td>description</td>
          <td>
           <textarea type="text" name="description" cols="30" rows="5" value="">
<?php echo $description; ?>
           </textarea>
          </td>
        </tr>

        <tr>
          <td>price</td>
          <td>
           <input type="number" name="price" value="<?php echo $price; ?>">
          </td>
        </tr>


        <tr>
          <td>Current image </td>
          <td>
           <?php
            if($image_current == 0){
              echo "no image added";
            }else{
              ?>
              <img src="../images/food/<?php echo$image_current; ?>" alt="" width="100px" height="75px">
              <?php
            }
            ?>
          </td>
        </tr>

        <tr>
          <td>select new image </td>
          <td>
           <input type="file" name="img">
          </td>
        </tr>



        <tr>
          <td>category</td>
          <td>
          <select name="category">

            <?php
             $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
             $res = mysqli_query($con,$sql);
             $count = mysqli_num_rows($res);
             if($count>0){
               while($row = mysqli_fetch_assoc($res)){
                 $id1 = $row['id'];
                 $category = $row['title'];

                 // echo "<option value='$id'>$category</option>";
                 ?>
                 <option <?php if($category_current==$id1){echo "selected";} ?> value='<?php echo $id1;  ?>'><?php echo $category; ?></option>
                 <?php
               }
             }else {
               // echo "<option value='0'>no category</option>";
             }
             ?>


          </select>
          </td>
        </tr>




        <tr>
          <td>feature</td>
          <td>
           <input <?php if($featured == 'Yes'){echo "checked";} ?> type="radio" name="feature" value="Yes"> Yes
           <input <?php if($featured == 'No'){echo "checked";} ?> type="radio" name="feature" value="No"> No
          </td>
        </tr>

        <tr>
          <td>active</td>
          <td>
           <input <?php if($active == 'Yes'){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
           <input <?php if($active == 'No'){echo "checked";} ?> type="radio" name="active" value="No"> No
          </td>
        </tr>

        <tr>

          <td>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="image_current" value="<?php echo $image_current; ?>">
           <input type="submit" name="submit" value="update food" class="btn-secondary">
          </td>
        </tr>



      </table>
    </form>
  </div>
</div>




<?php include '../admin/partials/footer.php';?>

<?php if(isset($_POST['submit'])){

  $id11 = $_POST['id'];
  $title11 = $_POST['title'];
  $description11 = $_POST['description'];
  $price11 = $_POST['price'];
  $image_current11 = $_POST['image_current'];
  $category11 = $_POST['category'];
  $featured11 = $_POST['feature'];
  $active11 = $_POST['active'];

  // echo $id11;
  // echo $title11;
  // echo $description11;
  // echo $price11;
  // echo $image_current11;
  // echo $category11;
  // echo $featured11;
  // echo $active11;


  if($_FILES['img']['name'] !== ""){
    $image_name11 = $_FILES['img']['name'];
    $ex = end(explode('.',$image_name11));
    $image_name11 = 'food_new'.rand(0000,9999).'.'.$ex;
    $src = $_FILES['img']['tmp_name'];
    $des = "../images/food/".$image_name11;
    $up = move_uploaded_file($src,$des);

    if($up==false){
      $_SESSION['uploud']= "<div class='error'>uploade error</div>";
      header('location'.URL.food/manage-food.php);
      die();
    }
    if($image_current11 !=""){
      $ip = "../images/food/".$image_current11;
      $rmm = unlink($ip);

      if($rmm==false){
        $_SESSION['delete']= "<div class='error'>delete error</div>";
        header('location'.URL.food/manage-food.php);
        die();
      }
    }
    }else {
    $image_name11 = $image_current11;
  }


    $sql88 = "UPDATE tbl_food SET
     title = '$title',
     description = '$description11',
     price = '$price11',
     image_name = '$image_name11',
     category_id = '$category11',
     feature = '$featured11',
     active = '$active11'
     WHERE id = '$id11'
    ";

      $res88 = mysqli_query($con,$sql88);

  if($res88==true){
      $_SESSION['update']= "<div class = 'success'> updated successfuly</div>";
      header('location:'.URL.'food/manage-food.php');
  }
  else {
      $_SESSION['update']= "<div class = 'error'> updated feild</div>";
      header('location:'.URL.'food/update_food.php');
  }

} ?>
