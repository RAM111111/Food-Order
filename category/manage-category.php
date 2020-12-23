<?php include('../admin/partials/menu.php') ?>
<div class="main-content">
  <div class="wrapper">
    <h1>Manage Category</h1>
    <br><br>

    <?php
    if(isset($_SESSION['add_cat'])){
      echo $_SESSION['add_cat'];
      unset($_SESSION['add_cat']);

     ?>

<br><br>
    <a href="../category/add_category.php" class="btn-primary">Add category</a>
    <br><br><br>
    <table class="tbl-full">
      <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Image Name</th>
        <th>Featured</th>
        <th>Active</th>
        <th>ACTION</th>
      </tr>
      <?php
        $sql = "SELECT * FROM tbl_category";

        $res = mysqli_query($con,$sql);
        $count = mysqli_num_rows($res);
        $i = 1;

        if($count>0){
            while ($row =  mysqli_fetch_assoc($res)) {
              $id = $row['id'];
              $title = $row['title'];
              $image_name = $row['image_name'];
              $featured = $row['featured'];
              $active = $row['active'];

              ?>
              <tr>
                <td><?php echo $i++ ;?></td>
                <td><?php echo $title ;?> </td>
                <td><?php
                if( $image_name!= ""){
                  ?>
                  <img src="<?php echo URL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                  <?php
                }else {
                  echo "<div class = 'error'> img not added </div>" ;
                }
                ?></td>
                <td><?php echo $featured;?></td>
                <td><?php echo $active ;?></td>
                <td><a href="#" class="btn-secondary">update Admin</a>
                    <a href="../category/delet_category.php" class="btn-danger">Delete Admin</a></td>
              </tr>

              <?php

            }
        }else{
          ?>
          <tr>
            <td colspan="6"><div class="error">no Category addee</div></td>
          </tr>
          <?php
        }
       ?>

    </table>
  </div>


</div>
<?php include('../admin/partials/footer.php') ?>
