<?php include '../admin/partials/menu.php'; ?>
<div class="main-content">
  <div class="wrapper">
    <h1>Add Food</h1>

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
             } {
               // code...
             }

           }else {
             ?>
             <option value="0">no category found </option>
             <?php
           }

             ?>
            <!-- <option value="1">food</option>
            <option value="2">snak</option> -->
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
     if ($_POST['submit']) {

       $id=$_POST['id'];
       $title=$_POST['title'];
       $description=$_POST['$description'];
       $price=$_POST['price'];
       $category=$_POST['$category'];


       if(isset($_POST['featured'])){
         $featured=$_POST['featured'];
       }else {
         $featured="No";
       }

       if(isset($_POST['active'])){
         $featured=$_POST['active'];
       }else {
         $featured="No";
       }

     }
     ?>

  </div>

</div>
<?php include '../admin/partials/footer.php'; ?>
