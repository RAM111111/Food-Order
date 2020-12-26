<?php include '../admin/partials/menu.php'; ?>
<div class="main-content">
  <div class="wrapper">
    <h1>Add Food</h1>
    <br><br>

      <?php
        if(isset($_SESSION['uploud'])){
          echo $_SESSION['uploud'];
          unset($_SESSION['uploud']);
        }
       ?>

    <br><br>
    <form  action="" method="post" enctype="multipart/form-data">
      <table class="tbl-30" >
        <tr>
          <td>title:</td>
          <td>
           <input type="text" name="title" placeholder="food title">
          </td>
        </tr>

        <tr>
          <td>description:</td>
          <td>
           <textarea name="description" rows="5" cols="30" placeholder="food description"></textarea>
          </td>
        </tr>

        <tr>
          <td>price:</td>
          <td>
          <input type="number" name="price" placeholder="food price">
          </td>
        </tr>


        <tr>
        <td>select image</td>
        <td>
        <input type="file" name="img">
        </td>
        </tr>

        <tr>
          <td>Category</td>
          <td>
          <select class="" name="category">
            <?php

           $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
           $res = mysqli_query($con,$sql);

           $count = mysqli_num_rows($res);

           if($count>0){
             while ($row=mysqli_fetch_assoc($res)){
               $id= $row['id'];
               $title=$row['title'];
               ?>
               <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
               <?php
             }
           }else {
             ?>
             <option value="0">no category found </option>
             <?php
           }

             ?>
          </select>
          </td>
        </tr>

        <tr>
          <td>featured</td>
          <td>
          <input type="radio" name="featured" value="Yes"> yes
          <input type="radio" name="featured" value="No"> yes
          </td>
        </tr>

        <tr>
          <td>active</td>
          <td>
          <input type="radio" name="active" value="Yes"> yes
          <input type="radio" name="active" value="No"> yes
          </td>
        </tr>

        <tr>
          <td colspan="2">
          <input type="submit" name="submit" value="add food" class="btn-secondary">
          </td>
        </tr>

      </table>
    </form>

    <?php
     if(isset($_POST['submit'])) {

       $title=$_POST['title'];
       $description=$_POST['description'];
       $price=$_POST['price'];
       $category=$_POST['category'];



       if(isset($_POST['featured'])){
         $featured=$_POST['featured'];
       }else {
         $featured="No";
       }

       if(isset($_POST['active'])){
         $active=$_POST['active'];
       }else {
         $active="No";
       }

       // echo $title ;
       // echo $description;
       // echo $price;
       // echo $img_n;
       // echo $category;
       // echo $featured;
       // echo $active;
       //
       // die();

       if(($_FILES['img']['name']) !=''){
       $img_n = $_FILES['img']['name'];
       $ex = end(explode('.',$img_n));
       $img_n = "food_new".rand(000,999).'.'.$ex;

         $sp = $_FILES['img']['tmp_name'];
         $des = "../images/food/".$img_n;
         $up = move_uploaded_file($sp,$des);
         if($up==false){
           $_SESSION['uploud'] = "<div class = 'error'> uploud feild</div>";;
           header('location:'.URL.'food/add_food.php');
           die();
         }

       }else {
       $img_n = "";
       }



       $sql2 = "INSERT INTO tbl_food SET
        title = '$title',
        description = '$description',
        price = '$price',
        image_name = '$img_n',
        category_id  = '$category',
        feature = '$featured',
        active = '$active'
       ";

       $res2 = mysqli_query($con,$sql2);

       if($res2==true){
         $_SESSION['add'] = "<div class='success'>added successfuly</div>";
         header('location:'.URL.'food/manage-food.php');

       }else {
         $_SESSION['add'] = "<div class='error'>added feild</div>";
         header('location:'.URL.'food/manage-food.php');
       }

     }
     ?>

  </div>

</div>
<?php include '../admin/partials/footer.php'; ?>
