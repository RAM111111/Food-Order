<?php include('../admin/partials/menu.php') ?>
<div class="main-content">
  <div class="wrapper">
    <h1>Manage Food</h1>
    <br><br>
    <?php
      if(isset($_SESSION['uploade'])){
        echo $_SESSION['uploade'];
        unset($_SESSION['uploade']);
      }
      if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
    }
    if(isset($_SESSION['delete'])){
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }

    if(isset($_SESSION['delete-1'])){
      echo $_SESSION['delete-1'];
      unset($_SESSION['delete-1']);
    }
     ?>
    <br><br>
    <a href="../food/add_food.php" class="btn-primary">Add Food</a>
    <br><br><br>
    <table class="tbl-full">
      <tr>
        <th>S.N</th>
        <th>title</th>
        <th>price</th>
        <th>image</th>
        <th>featured</th>
        <th>active</th>
        <th>action</th>
      </tr>
      <?php
        $sql = "SELECT * FROM tbl_food";
        $res = mysqli_query($con,$sql);

        $count = mysqli_num_rows($res);
        $i = 1;
        if($count>0){
          while ($row = mysqli_fetch_assoc($res)) {
            $id = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
            $featured = $row['feature'];
            $active = $row['active'];
            ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $title; ?></td>
              <td><?php echo $price; ?> </td>
              <td><?php
                 if($image_name ==""){
                   echo "<div class='error'>no image added</div>";
                 }else {
                  ?>
                  <img src="../images/food/<?php echo $image_name; ?>" alt="" width="100px" height="75px">
                  <?php
                 }
               ?></td>
              <td><?php echo $featured; ?> </td>
              <td><?php echo $active; ?></td>
              <td><a href="#" class="btn-secondary">update Admin</a>
                  <a href="../food/delete_food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Admin</a></td>
            </tr>

            <?php
          }
        }else{
          echo "<th><td colspan='7' class='error'>active</td></th>";
        }

       ?>


    </table>
  </div>


</div>
<?php include('../admin/partials/footer.php') ?>
