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
           <textarea type="text" name="description" cols="30" rows="5" value="" >
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
  $idd = $_POST['id'];
  $title11 = $_POST['title11'];
  $description11 = $_POST['description'];
  $price11 = $_POST['price'];
  $image_current11 = $_POST['image_current'];
  $category11 = $_POST['category'];
  $featured = $_POST['feature'];
  $active = $_POST['active'];


  if($_FILES['img']['name'] !== ""){
    $image_name = $_FILES['img']['name'];
    $ex = end(explode('.',$image_name));
    $image_name = 'food_new'.rand(0000,9999).'.'.$ex;
    $src = $_FILES['img']['tmp_name'];
    $des = "../images/food/".$image_name;

    $up = move_uploaded_file($src,$des);

    if($up==false){
      $_SESSION['uploud']= "<div class='error'>uploade error</div>";
      header('location'.URL.food/manage-food.php);
      die();
    }
    if($image_current!=0){
      $ip = "../images/food".$image_current;
      $rmm = unlink($ip);

      if($rmm==false){
        $_SESSION['delete']= "<div class='error'>delete error</div>";
        header('location'.URL.food/manage-food.php);
        die();
      }
    }

  }else {
    $image_name = $image_current;
  }
  $sqlup = "UPDATE tbl_food SET
  title='$title11',
  description='$description11',
  price='$price11',
  image_name='$image_name',
  category='$category11',
  feature='$featured',
  active='$active'




  WHERE id='$idd'";

  $resup = mysqli_query($sqlup);

  if($resup==true){
    $_SESSION['delete']= "<div class='success'>update succesfuly </div>";
    header('location'.URL.food/manage-food.php);
  }else{
    $_SESSION['delete']= "<div class='error'>update error</div>";
    header('location'.URL.food/manage-food.php);
  }

} ?>
